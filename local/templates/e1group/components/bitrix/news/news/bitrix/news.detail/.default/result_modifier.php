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

// Обработка файлов для галереи
$arResult['GALLERY'] = [];

if (is_array($arResult["DISPLAY_PROPERTIES"]["MORE_PHOTO"]["VALUE"])) {
  foreach ($arResult["DISPLAY_PROPERTIES"]["MORE_PHOTO"]["VALUE"] as $fileId) {
    $file = [];
    $arFile = CFile::GetFileArray($fileId);
    $fileBig = CFile::ResizeImageGet($arFile, ['width'=>2160, 'height'=>2160], BX_RESIZE_IMAGE_PROPORTIONAL, true);
    $fileSmall = CFile::ResizeImageGet($arFile, ['width'=>800, 'height'=>800], BX_RESIZE_IMAGE_PROPORTIONAL, true);
    $webPBig = SiteUtil::getWebP($fileBig['src'], ['QUALITY' => IMG_QUALITY]);
    $webPSmall = SiteUtil::getWebP($fileSmall['src'], ['QUALITY' => IMG_QUALITY]);

    $file['ORIGINAL'] = [
      'SRC' => $arFile['SRC'],
      'WIDTH' => $arFile['WIDTH'],
      'HEIGHT' => $arFile['HEIGHT'],
    ];

    $file['BIG'] = [
      'SRC' => $fileBig['src'],
      'WIDTH' => $fileBig['width'],
      'HEIGHT' => $fileBig['height'],
    ];

    $file['SMALL'] = [
      'SRC' => $fileSmall['src'],
      'WIDTH' => $fileSmall['width'],
      'HEIGHT' => $fileSmall['height'],
    ];

    if ($webPBig) {
      $file['BIG']['WEBP'] = $webPBig['SRC'];
    }

    if ($webPSmall) {
      $file['SMALL']['WEBP'] = $webPSmall['SRC'];
    }

    $file['DESCRIPTION'] = $arFile["DESCRIPTION"];
    $arResult['GALLERY'][] = $file;
  }
}

