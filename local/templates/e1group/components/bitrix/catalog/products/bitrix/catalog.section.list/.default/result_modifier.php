<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

/** @global array $arResult */

if (0 < $arResult['SECTIONS_COUNT'])
{
	$boolPicture = false;
	$boolDescr = false;
	$arSelect = array('ID');
	$arMap = array();
  $arSelect[] = 'UF_*';
  $arSelect[] = 'IBLOCK_ID';
  $arSelect[] = 'PICTURE';
  $arSelect[] = 'DESCRIPTION';
  $arSelect[] = 'DESCRIPTION_TYPE';

  foreach ($arResult['SECTIONS'] as $key => $arSection)
  {
    $arMap[$arSection['ID']] = $key;
  }

  $rsSections = CIBlockSection::GetList(array('SORT' => 'ASC', 'NAME' => 'ASC'), array('ID' => array_keys($arMap), 'IBLOCK_ID' => $arParams['IBLOCK_ID']), false, $arSelect);

  while ($arSection = $rsSections->GetNext())
  {
    if (!isset($arMap[$arSection['ID']]))
      continue;
    $key = $arMap[$arSection['ID']];
    $arSection['PICTURE'] = intval($arSection['PICTURE']);
    $arSection['PICTURE'] = (0 < $arSection['PICTURE'] ? CFile::GetFileArray($arSection['PICTURE']) : false);
    $arResult['SECTIONS'][$key]['PICTURE'] = $arSection['PICTURE'];
    $arResult['SECTIONS'][$key]['~PICTURE'] = $arSection['~PICTURE'];
    $arResult['SECTIONS'][$key]['DESCRIPTION'] = $arSection['DESCRIPTION'];
    $arResult['SECTIONS'][$key]['~DESCRIPTION'] = $arSection['~DESCRIPTION'];
    $arResult['SECTIONS'][$key]['DESCRIPTION_TYPE'] = $arSection['DESCRIPTION_TYPE'];
    $arResult['SECTIONS'][$key]['~DESCRIPTION_TYPE'] = $arSection['~DESCRIPTION_TYPE'];

    if($arSection['UF_SITE_LINK']) {
      $arResult['SECTIONS'][$key]['UF_SITE_LINK'] = $arSection['UF_SITE_LINK'];
      $arResult['SECTIONS'][$key]['~UF_SITE_LINK'] = $arSection['~UF_SITE_LINK'];
    }

    if($arSection['UF_BRAND_LOGO']) {
      $arResult['SECTIONS'][$key]['UF_BRAND_LOGO'] = (0 < $arSection['UF_BRAND_LOGO'] ? CFile::GetFileArray($arSection['UF_BRAND_LOGO']) : false);
    }
  }
}
?>