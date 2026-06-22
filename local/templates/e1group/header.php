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
  $APPLICATION->ShowHead();?>
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="192x192" href="/android-chrome-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
  <link rel="shortcut icon" href="/favicon.ico">
  <?php
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
      <div class="header__left">
        <a class="logo header__logo" href="/" aria-label="Переход на главную страницу">
          <img src="<?=$APPLICATION->GetTemplatePath("assets/images/logo_writing_black.svg")?>" alt="site logo">
        </a>
        <div class="header__links">
          <div class="header__products">
            <span data-toggle="productsMenu">
              <svg class="svg-icon" viewBox="0 0 24 24" width="24" height="24">
                <use xlink:href="#svg-icon-menu-dots"></use>
              </svg>
            </span>
            <a href="/products/">Продукция и услуги</a>
          </div>
          <?php include("partial/header.nav.php");?>
        </div>
      </div>
      <div class="header__right">
        <div class="header__controls">
          <div class="header__search">
            <button class="btn-search header__search-btn" type="button" data-toggle="search">
              <svg class="svg-icon" viewBox="0 0 24 24" width="24" height="24"><use xlink:href="#svg-icon-search"></use></svg>
            </button>
          </div>
          <?php /*?><div class="lang-panel"><a class="lang-panel__item" href="#">EN</a></div><?*/?>
          <button class="btn btn--primary header__feedback-btn" type="button" data-toggle="modal" data-target="#contactModal">
            <svg class="svg-icon" viewBox="0 0 24 24" width="24" height="24"><use xlink:href="#svg-icon-edit"></use></svg>
            <span>Свяжитесь с нами</span></button>
          <div class="burger header__burger" data-toggle="menu" data-target="mobile-menu"><span></span></div>
        </div>
      </div>
    </div>
  </header>
  <div class="layout__main">
    <?php
    $APPLICATION->IncludeComponent("bitrix:breadcrumb", "", array(
        "PATH" => "",
        "SITE_ID" => "s1",
        "START_FROM" => "0",
    ),
        false
    );
    ShowHeadline();
    ?>
