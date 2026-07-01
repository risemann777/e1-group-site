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
  <meta name="theme-color" content="#E01F26">
  <meta property="og:locale" content="ru_RU">
  <meta property="og:site_name" content="E1-Group / Е1 Групп">
  <meta property="og:title" content="<?php $APPLICATION->ShowProperty('title'); ?>" />
  <meta property="og:description" content="<?php $APPLICATION->ShowProperty('og_description'); ?>">
  <meta property="og:type" content="website">
  <meta property="og:url" content="https://e1-group.ru/">
  <meta property="og:image" content="<?php $APPLICATION->ShowProperty('summary_large_image'); ?>">
  <meta property="og:image:secure_url" content="<?php $APPLICATION->ShowProperty('summary_large_image'); ?>">
  <meta property="og:image:type" content="image/png">
  <meta property="og:image:width" content="<?php $APPLICATION->ShowProperty('og_image_width'); ?>">
  <meta property="og:image:height" content="<?php $APPLICATION->ShowProperty('og_image_height'); ?>">
  <meta property="og:image:alt" content="E1-Group / Е1 Групп">

  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?php $APPLICATION->ShowProperty('title'); ?>">
  <meta name="twitter:description" content="<?php $APPLICATION->ShowProperty('twitter_description'); ?>">
  <meta name="twitter:image" content="<?php $APPLICATION->ShowProperty('summary_large_image'); ?>">

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
<div class="layout <?php $APPLICATION->ShowProperty("layoutClasses", "layout--default");?>">
  <?php include("partial/header.full.menu.php");?>
  <?php include("partial/header.search.menu.php");?>
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
