<?php
if (!defined ('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
{
  die();
}

/** @var CMain $APPLICATION */
?>

<div class="search-menu search-menu--fall">
  <div class="search-menu__bg" data-toggle="search"></div>
  <div class="search-menu__panel">
    <div class="search-menu__wrapper">
      <div class="search-menu__container">
        <?$APPLICATION->IncludeComponent(
            "bitrix:search.form",
            "main",
            [
                "PAGE" => "#SITE_DIR#search/",
                "USE_SUGGEST" => "N",
                "COMPONENT_TEMPLATE" => "main"
            ],
            false
        );?>
      </div>
    </div>
  </div>
</div>
