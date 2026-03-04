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
  <header class="layout__header header header--sticky">
    <div class="header__container">
      <div class="header__navbar"><a class="logo header__logo" href="/" aria-label="Переход на главную страницу">
          <svg class="svg-icon" viewBox="0 0 182 29" width="182" height="29">
            <use xlink:href="#svg-logo"></use>
          </svg>
        </a>
        <nav class="nav header__nav">
          <ul class="nav__list">
            <li class="nav__item"><a class="nav__link" href="#advantage" data-smooth-scroll="true">О
                компании</a></li>
            <li class="nav__item"><a class="nav__link" href="#partnership" data-smooth-scroll="true">Сотрудничество</a>
            </li>
            <li class="nav__item"><a class="nav__link" href="#news" data-smooth-scroll="true">Медиа</a></li>
            <li class="nav__item"><a class="nav__link" href="#contacts">Контакты</a></li>
          </ul>
        </nav>
      </div>
      <div class="header__controls"><!-- .header__phone: a(href="tel:+7 (499) 344-40-12") +7 (499) 344-40-12-->
        <button class="btn btn--primary header__button" type="button" data-toggle="modal" data-target="#contactModal">Свяжитесь с нами</button>
      </div>
      <div class="hamburger hamburger--mobile header__hamburger" data-toggle="menu" data-target="mobile-menu"></div>
    </div>
  </header>
  <div class="layout__main">
