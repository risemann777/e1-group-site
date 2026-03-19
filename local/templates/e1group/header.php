<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
{
  die();
}

use \Bitrix\Main\Page\Asset;

/** @var \CMain $APPLICATION */
$asset = Asset::getInstance();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?php $APPLICATION->ShowTitle();?></title>
  <?php
  $APPLICATION->ShowHead();
  $asset->addJs($APPLICATION->GetTemplatePath("assets/js/plugins.bundle.js"));
  $asset->addJs($APPLICATION->GetTemplatePath("assets/js/main.bundle.js"));
  $asset->addCss($APPLICATION->GetTemplatePath("assets/css/main.css"));
  ?>
</head>
<body class="page page--main">
<?php
$APPLICATION->ShowPanel();
include("include_areas/svg_icons.php");
?>
<div class="layout layout--pb-0">
  <?php include("partial/header.full.menu.php");?>
  <header class="layout__header header header--sticky">
    <div class="header__container">
      <div class="header__navbar">
        <a class="logo header__logo" href="/" aria-label="Переход на главную страницу">
          <svg class="svg-icon" viewBox="0 0 182 29" width="182" height="29">
            <use xlink:href="#svg-logo"></use>
          </svg>
        </a>
        <?php include("partial/header.nav.php");?>
      </div>
      <div class="header__controls"><!-- .header__phone: a(href="tel:+7 (499) 344-40-12") +7 (499) 344-40-12-->
        <button class="btn btn--primary header__button" type="button" data-toggle="modal" data-target="#contactModal">Свяжитесь с нами</button>
      </div>
      <div class="burger burger--mobile header__burger" data-toggle="menu" data-target="mobile-menu"><span></span></div>
    </div>
  </header>
  <div class="layout__main">
    <?php $APPLICATION->IncludeComponent("bitrix:breadcrumb", "", array(
        "PATH" => "",
        "SITE_ID" => "s1",
        "START_FROM" => "0",
    ),
        false
    );?>
