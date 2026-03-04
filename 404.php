<?php
/** @var CMain $APPLICATION */
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetPageProperty("NOT_SHOW_NAV_CHAIN", "Y");
$APPLICATION->SetPageProperty("NOT_SHOW_HEADLINE", "Y");
$APPLICATION->SetPageProperty("layoutClasses", "layout--inner");
$APPLICATION->SetTitle("Страница 404");
$APPLICATION->AddChainItem("Страница 404");
?>
  <div class="error-page">
    <div class="error-page__container">
      <h1 class="error-page__title">404 ошибка</h1>
      <div class="error-page__description">
        <p>К сожалению, запрашиваемая вами страница не найдена. Возможно, вы
          ввели неправильный адрес, либо страница была удалена. Мы сожалеем об этом. Пожалуйста, проверьте
          правильность введенного адреса и попробуйте снова.</p>
        <p>Если проблема сохраняется, пожалуйста, свяжитесь с нашей поддержкой. Или перейдите на <a href="/">Главную страницу</a>.</p>
      </div>
    </div>
  </div>
<?php require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>