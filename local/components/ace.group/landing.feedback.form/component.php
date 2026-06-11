<?php
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();

/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponent $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */

use Bitrix\Main\Mail\Event;
use Bitrix\Main\Application;

$kernelSession = Application::getInstance()->getKernelSession();
$rsSite = CSite::GetByID(SITE_ID);
$arSite = $rsSite->Fetch();
// PR($arSite);

$arResult["PARAMS_HASH"] = md5(serialize($arParams).$this->GetTemplateName());

$arParams["USE_CAPTCHA"] = (($arParams["USE_CAPTCHA"] != "N" && !$USER->IsAuthorized()) ? "Y" : "N");
$arParams["EVENT_NAME"] = trim($arParams["EVENT_NAME"] ?? '');

if($arParams["EVENT_NAME"] == '')
	$arParams["EVENT_NAME"] = "LANDING_FEEDBACK_FORM";

$arParams["EMAIL_TO"] = trim($arParams["EMAIL_TO"] ?? '');

if($arParams["EMAIL_TO"] == '')
	$arParams["EMAIL_TO"] = COption::GetOptionString("main", "email_from");

$arParams["OK_TEXT"] = trim($arParams["OK_TEXT"] ?? '');

if($arParams["OK_TEXT"] == '')
	$arParams["OK_TEXT"] = GetMessage("MF_OK_MESSAGE");

$arParams["FORM_NAME"] = trim($arParams["FORM_NAME"] ?? '');

if ($arParams["FORM_NAME"] == '') {
  $arParams["FORM_NAME"] = GetMessage("MF_FORM_NAME");
}

$arParams["FORM_THEME"] = trim($arParams["FORM_THEME"] ?? '');

if($arParams["FORM_THEME"] == '')
  $arParams["FORM_THEME"] = "DARK";

$arParams["FORM_THEME"] = strtolower($arParams["FORM_THEME"]);

$prohibitedWords = [
  "http",
  "href",
  "@gmail.com",
  "@list.ru",
  "@mail.ru",
  "@yahoo.com",
  "@yahoo.ru",
  "@yandex.ru",
  "access",
  "allow",
  "bind",
  "bitcoin",
  "bonus",
  "boost",
  "browser",
  "business",
  "case",
  "cash",
  "casino",
  "connect",
  "desktop",
  "device",
  "diamond",
  "domains",
  "easy",
  "external",
  "fashion",
  "free",
  "gift",
  "helper",
  "hot",
  "html",
  "important",
  "keywords",
  "location",
  "magic",
  "market",
  "network",
  "online",
  "panties",
  "peasy",
  "porn",
  "portfolio",
  "powerful",
  "puzzle",
  "real",
  "relax",
  "search",
  "spot",
  "spread",
  "squeezy",
  "trust",
  "user",
  "visit",
  "vodka",
  "want",
  "watch",
  "website",
  "win",
  "автобус",
  "алкоголь",
  "бoт",
  "банкрот",
  "билайн",
  "биткоин",
  "брак",
  "долг",
  "доход",
  "заболевани",
  "заём",
  "займ",
  "законно",
  "инструктор",
  "кандидат",
  "капч",
  "кешбэк",
  "корпоратив",
  "круглосуточно",
  "лид",
  "ликер",
  "мегафон",
  "налог",
  "недорог",
  "оборона",
  "обороны",
  "посредник",
  "прибыли",
  "прибыль",
  "провайдер",
  "психолог",
  "работодател",
  "рассылк",
  "рейтинг",
  "рентабельность",
  "симулятор",
  "скрипт",
  "спам",
  "тpафик",
  "шампанское",
  "штраф",
];

if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["submit"]) && (!isset($_POST["PARAMS_HASH"]) || $arResult["PARAMS_HASH"] === $_POST["PARAMS_HASH"]))
{
	$arResult["ERROR_MESSAGE"] = array();
  $arResult["PROHIBITED_WORDS_FOUND"] = [];

	if(check_bitrix_sessid())
	{
		if(empty($arParams["REQUIRED_FIELDS"]) || !in_array("NONE", $arParams["REQUIRED_FIELDS"]))
		{
			if((empty($arParams["REQUIRED_FIELDS"]) || in_array("NAME", $arParams["REQUIRED_FIELDS"])) && mb_strlen(trim($_POST["user_name"])) <= 1)
				$arResult["ERROR_MESSAGE"]["user_name"] = GetMessage("MF_REQ_NAME");

      if((empty($arParams["REQUIRED_FIELDS"]) || in_array("PHONE", $arParams["REQUIRED_FIELDS"])) && mb_strlen(trim($_POST["user_phone"])) <= 5)
        $arResult["ERROR_MESSAGE"]["user_phone"] = GetMessage("MF_REQ_PHONE");

			if((empty($arParams["REQUIRED_FIELDS"]) || in_array("EMAIL", $arParams["REQUIRED_FIELDS"])) && mb_strlen(trim($_POST["user_email"])) <= 1)
				$arResult["ERROR_MESSAGE"]["user_email"] = GetMessage("MF_REQ_EMAIL");

			if((empty($arParams["REQUIRED_FIELDS"]) || in_array("COMMENT", $arParams["REQUIRED_FIELDS"])) && mb_strlen(trim($_POST["user_comment"])) <= 3)
				$arResult["ERROR_MESSAGE"]["user_comment"] = GetMessage("MF_REQ_COMMENT");

			if((empty($arParams["REQUIRED_FIELDS"]) || in_array("ADDRESS_CITY", $arParams["REQUIRED_FIELDS"])) && mb_strlen(trim($_POST["user_address_city"])) <= 2)
				$arResult["ERROR_MESSAGE"]["user_address_city"] = GetMessage("MF_REQ_ADDRESS_CITY");
		}

    if (!isset($_POST["policy"])) {
      $arResult["ERROR_MESSAGE"]["policy"] = GetMessage("MF_REQ_POLICY");
    }

    if (mb_strlen(trim($_POST["user_name"])) > 0) {
      if (preg_match('/[A-Za-z]/', trim(htmlspecialcharsbx($_POST["user_name"])))) {
        $arResult["ERROR_MESSAGE"]["user_name"] = GetMessage("MF_FIELD_CONTAINS_INVALID_CHARACTERS");
      }
    }

    if (mb_strlen(trim($_POST["user_phone"])) > 0) {
      if (!validatePhoneNumber(trim(htmlspecialcharsbx($_POST["user_phone"])))) {
        $arResult["ERROR_MESSAGE"]["user_phone"] = GetMessage("MF_FIELD_CONTAINS_INVALID_CHARACTERS");
      }
    }

		if(mb_strlen(trim($_POST["user_email"])) > 1 && !check_email($_POST["user_email"]))
			$arResult["ERROR_MESSAGE"]["user_email"] = GetMessage("MF_EMAIL_NOT_VALID");

    if (mb_strlen(trim($_POST["user_comment"])) > 1) {
      $arResult["PROHIBITED_WORDS_FOUND"] = findSubstringsByArray(trim($_POST["user_comment"]), $prohibitedWords);

      if (!empty($arResult["PROHIBITED_WORDS_FOUND"]))
        $arResult["ERROR_MESSAGE"]["user_comment"] = GetMessage("MF_FIELD_CONTAINS_INVALID_WORDS");
    }

		if($arParams["USE_CAPTCHA"] == "Y")
		{
			$captcha_code = $_POST["captcha_sid"];
			$captcha_word = $_POST["captcha_word"];
			$cpt = new CCaptcha();
			$captchaPass = COption::GetOptionString("main", "captcha_password", "");
			if ($captcha_word <> '' && $captcha_code <> '')
			{
				if (!$cpt->CheckCodeCrypt($captcha_word, $captcha_code, $captchaPass))
					$arResult["ERROR_MESSAGE"]["captcha"] = GetMessage("MF_CAPTCHA_WRONG");
			}
			else
				$arResult["ERROR_MESSAGE"]["captcha"] = GetMessage("MF_CAPTHCA_EMPTY");
		}

    if ($arParams["USE_GOOGLE_RECAPTCHA"] == "Y")
    {
      if ($kernelSession->has('gRecaptchaResponse'))
      {
        $arResult["gRecaptchaResponse"] = json_decode($kernelSession->get('gRecaptchaResponse'));

        if ($arResult["gRecaptchaResponse"]->score < 0.5) {
          $arResult["ERROR_MESSAGE"]["gRecaptcha"] = GetMessage("MF_RECAPTCHA_WRONG");
        }
      }
      else
      {
        $arResult["ERROR_MESSAGE"]["gRecaptcha"] = GetMessage("MF_RECAPTCHA_WRONG");
      }
    }

		if(empty($arResult["ERROR_MESSAGE"]))
		{
			$arFields = Array(
				"AUTHOR_NAME" => $_POST["user_name"],
				"AUTHOR_PHONE" => $_POST["user_phone"],
				"AUTHOR_EMAIL" => $_POST["user_email"],
				"AUTHOR_COMMENT" => $_POST["user_comment"],
				"AUTHOR_ADDRESS_CITY" => $_POST["user_address_city"],
				"EMAIL_TO" => $arParams["EMAIL_TO"],
				"FORM_NAME" => $arParams["FORM_NAME"],
			);

      if ($arResult["gRecaptchaResponse"]) {
        $arFields["AUTHOR_SCORE"] = $arResult["gRecaptchaResponse"]->score;
      } else {
        $arFields["AUTHOR_SCORE"] = GetMessage("MF_AUTHOR_SCORE_NOT_DEFINED");
      }

			if(!empty($arParams["EVENT_MESSAGE_ID"])) {
				foreach($arParams["EVENT_MESSAGE_ID"] as $v) {
          if(intval($v) > 0) {
            Event::send([
              "EVENT_NAME" => $arParams["EVENT_NAME"],
              "MESSAGE_ID" => intval($v),
              "LID" => SITE_ID,
              "C_FIELDS" => $arFields,
            ]);
          }
        }
			} else {
        Event::send([
          "EVENT_NAME" => $arParams["EVENT_NAME"],
          "LID" => SITE_ID,
          "C_FIELDS" => $arFields,
        ]);
      }

			$_SESSION["MF_NAME"] = htmlspecialcharsbx($_POST["user_name"]);
			$_SESSION["MF_PHONE"] = htmlspecialcharsbx($_POST["user_phone"]);
			$_SESSION["MF_EMAIL"] = htmlspecialcharsbx($_POST["user_email"]);
			$event = new \Bitrix\Main\Event('main', 'onFeedbackFormSubmit', $arFields);
			$event->send();

      $currentURL = getCurrentURL();
      $urlQuery = parse_url($currentURL, PHP_URL_QUERY);
      parse_str($urlQuery, $urlParams);

      // Lead for Bitrix24
      $leadData = [
        'fields' => [
          'TITLE' => $arSite["NAME"] . ': заявка с формы ' . $arParams["FORM_NAME"],
          'NAME' => trim(htmlspecialcharsbx($_POST["user_name"])),
          'PHONE' => [
            ['VALUE' => trim(htmlspecialcharsbx($_POST["user_phone"])), 'VALUE_TYPE' => 'WORK']
          ],
          'EMAIL' => [
            ['VALUE' => trim(htmlspecialcharsbx($_POST["user_email"])), 'VALUE_TYPE' => 'WORK']
          ],
          'ADDRESS_CITY' => trim(htmlspecialcharsbx($_POST["user_address_city"])),
          'COMMENTS' => trim(htmlspecialcharsbx($_POST["user_comment"])),
          'SOURCE_ID' => 'WEB',
          'SOURCE_DESCRIPTION' => 'Сайт ' . $arSite["NAME"] . ' / форма " ' . $arParams["FORM_NAME"] . '"',
        ],
        'params' => [
          'REGISTER_SONET_EVENT' => 'Y' // Создать событие в "живой ленте" (опционально)
        ]
      ];

      if ($urlParams['utm_source']) $leadData['fields']['UTM_SOURCE'] = $urlParams['utm_source'];
      if ($urlParams['utm_medium']) $leadData['fields']['UTM_MEDIUM'] = $urlParams['utm_medium'];
      if ($urlParams['utm_campaign']) $leadData['fields']['UTM_CAMPAIGN'] = $urlParams['utm_campaign'];
      if ($urlParams['utm_content']) $leadData['fields']['UTM_CONTENT'] = $urlParams['utm_content'];
      if ($urlParams['utm_term']) $leadData['fields']['UTM_TERM'] = $urlParams['utm_term'];

      $leadAddResult = executeB24Rest("crm.lead.add", $leadData);
      $logFile = $_SERVER["DOCUMENT_ROOT"] . "/logs/b24_rest.log";
      file_put_contents($logFile, PHP_EOL . date('Y-m_d H:i:s') . ' New lead ID='. $leadAddResult['result'] . PHP_EOL, FILE_APPEND);

			LocalRedirect($APPLICATION->GetCurPageParam("success=".$arResult["PARAMS_HASH"], Array("success")));
		}

		$arResult["AUTHOR_COMMENT"] = trim(htmlspecialcharsbx($_POST["user_comment"]));
		$arResult["AUTHOR_NAME"] = trim(htmlspecialcharsbx($_POST["user_name"]));
		$arResult["AUTHOR_PHONE"] = trim(htmlspecialcharsbx($_POST["user_phone"]));
		$arResult["AUTHOR_EMAIL"] = trim(htmlspecialcharsbx($_POST["user_email"]));
		$arResult["AUTHOR_ADDRESS_CITY"] = trim(htmlspecialcharsbx($_POST["user_address_city"]));
		$arResult["POLICY"] = isset($_POST["policy"]) ? "Y" : "N";
	}
	else
		$arResult["ERROR_MESSAGE"]["session_expired"] = GetMessage("MF_SESS_EXP");
}
elseif(isset($_REQUEST["success"]) && $_REQUEST["success"] == $arResult["PARAMS_HASH"])
{
	$arResult["OK_MESSAGE"] = $arParams["OK_TEXT"];
}

if(empty($arResult["ERROR_MESSAGE"]))
{
	if($USER->IsAuthorized())
	{
		$arResult["AUTHOR_NAME"] = $USER->GetFormattedName(false);
		$arResult["AUTHOR_EMAIL"] = htmlspecialcharsbx($USER->GetEmail());
	}
	else
	{
		if($_SESSION["MF_NAME"] <> '')
			$arResult["AUTHOR_NAME"] = htmlspecialcharsbx($_SESSION["MF_NAME"]);

    if($_SESSION["MF_PHONE"] <> '')
      $arResult["AUTHOR_PHONE"] = htmlspecialcharsbx($_SESSION["MF_PHONE"]);

		if($_SESSION["MF_EMAIL"] <> '')
			$arResult["AUTHOR_EMAIL"] = htmlspecialcharsbx($_SESSION["MF_EMAIL"]);
	}
}

if($arParams["USE_CAPTCHA"] == "Y")
	$arResult["capCode"] =  htmlspecialcharsbx($APPLICATION->CaptchaGetCode());

$this->IncludeComponentTemplate();