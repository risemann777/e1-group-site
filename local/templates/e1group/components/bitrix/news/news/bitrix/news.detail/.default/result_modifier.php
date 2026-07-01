<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
{
	die();
}

global $APPLICATION;
/** @var array $arParams */
/** @var array $arResult */

$server = "https://" . $arResult["IBLOCK"]["SERVER_NAME"];

if (is_array($arResult["DETAIL_PICTURE"])) {
  $APPLICATION->SetPageProperty("summary_large_image", $server . $arResult["DETAIL_PICTURE"]["SRC"]);
  $APPLICATION->SetPageProperty("og_image_width", $arResult["DETAIL_PICTURE"]["WIDTH"]);
  $APPLICATION->SetPageProperty("og_image_height", $arResult["DETAIL_PICTURE"]["HEIGHT"]);
} elseif (is_array($arResult["PREVIEW_PICTURE"])) {
  $APPLICATION->SetPageProperty("summary_large_image", $server . $arResult["PREVIEW_PICTURE"]["SRC"]);
  $APPLICATION->SetPageProperty("og_image_width", $arResult["PREVIEW_PICTURE"]["WIDTH"]);
  $APPLICATION->SetPageProperty("og_image_height", $arResult["PREVIEW_PICTURE"]["HEIGHT"]);
}

if ($arResult["IPROPERTY_VALUES"]["ELEMENT_META_TITLE"]) {
  $APPLICATION->SetPageProperty("title", $arResult["IPROPERTY_VALUES"]["ELEMENT_META_TITLE"]);
} else {
  $APPLICATION->SetPageProperty("title", $arResult["NAME"]);
}

if ($arResult["IPROPERTY_VALUES"]["ELEMENT_META_DESCRIPTION"]) {
  $APPLICATION->SetPageProperty("description", $arResult["IPROPERTY_VALUES"]["ELEMENT_META_DESCRIPTION"]);
  $APPLICATION->SetPageProperty("og_description", $arResult["IPROPERTY_VALUES"]["ELEMENT_META_DESCRIPTION"]);
  $APPLICATION->SetPageProperty("twitter_description", $arResult["IPROPERTY_VALUES"]["ELEMENT_META_DESCRIPTION"]);
}

