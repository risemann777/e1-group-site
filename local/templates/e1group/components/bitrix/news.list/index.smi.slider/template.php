<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<?php
if (count($arResult["ITEMS"]) > 0) {
  ?>
  <section class="mass-media" id="massMedia">
    <div class="mass-media__head">
      <div class="mass-media__title">СМИ об АО «Е1-Групп»</div>
      <div class="mass-media__controls">
        <div class="mass-media__nav mass-media__nav-prev">
          <svg class="svg-icon" viewBox="0 0 24 24" width="24" height="24">
            <use xlink:href="#svg-icon-arrow-left"></use>
          </svg>
        </div>
        <div class="mass-media__nav mass-media__nav-next">
          <svg class="svg-icon" viewBox="0 0 24 24" width="24" height="24">
            <use xlink:href="#svg-icon-arrow-right"></use>
          </svg>
        </div>
      </div>
    </div>
    <div class="mass-media__slider swiper" id="massMediaSlider">
      <div class="swiper-wrapper">
        <?php
        foreach($arResult["ITEMS"] as $arItem) {
          $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
          $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
          ?>
          <div class="swiper-slide">
            <div class="mass-media-card">
              <div class="mass-media-card__bg"><img src="<?=SITE_TEMPLATE_PATH?>/assets/images/bg_card_smi.png" alt=""></div>
              <?php if($arItem["DISPLAY_PROPERTIES"]["LOGO"]["FILE_VALUE"] && $arItem["DISPLAY_PROPERTIES"]["LOGO"]["MULTIPLE"] === "N") {
                ?>
                <div class="mass-media-card__logo">
                  <img src="<?=$arItem["DISPLAY_PROPERTIES"]["LOGO"]["FILE_VALUE"]["SRC"]?>" alt="">
                </div>
                <?php
              }?>
              <div class="mass-media-card__info">
                <div class="mass-media-card__quotes">
                  <svg class="svg-icon" viewBox="0 0 64 64" width="64" height="64">
                    <use xlink:href="#svg-icon-quotes"></use>
                  </svg>
                </div>
                <?php if($arItem["PREVIEW_TEXT"] || ($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"])) {
                  ?>
                  <div class="mass-media-card__text">
                    <?php if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]) {
                      ?>
                        <h3><?=$arItem["NAME"]?></h3>
                      <?php
                    }?>
                    <?=$arItem["PREVIEW_TEXT"]?>
                  </div>
                  <?php
                }?>
                <?php if($arItem["DISPLAY_PROPERTIES"]["ARTICLE_LINK"]) {
                  ?>
                  <div class="mass-media-card__bottom">
                    <a class="mass-media-card__link" href="<?=$arItem["DISPLAY_PROPERTIES"]["ARTICLE_LINK"]["VALUE"]?>" target="_black" rel="noopener noreferrer">Читать статью</a>
                  </div>
                  <?php
                }?>
              </div>
            </div>
          </div>
          <?php
        }
        ?>
      </div>
    </div>
  </section>
  <?php
}
?>

