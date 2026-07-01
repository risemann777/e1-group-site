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

<?php if (0 < $arResult['SECTIONS_COUNT'])
{
  ?>
  <div class="direction__list">
    <?php foreach ($arResult['SECTIONS'] as $key => $arSection){
      ?>
      <div class="direction__item">
        <div class="direction__info">
          <div class="direction__content">
            <?php if (is_array($arSection['UF_BRAND_LOGO'])) {
              ?>
              <div class="direction__logo">
                <img src="<?=$arSection['UF_BRAND_LOGO']['SRC']?>" alt="Логотип <?=$arSection['NAME']?>">
              </div>
              <?php
            }?>
            <?php if ($arSection['DESCRIPTION']){
              ?>
              <div class="direction__description"><?=$arSection['DESCRIPTION']?></div>
              <?php
            }?>
          </div>
          <?php if ($arSection['UF_SITE_LINK']){
            ?>
            <div class="direction__button">
              <a class="btn btn--outline-primary btn--sm" href="<?=$arSection['UF_SITE_LINK']?>" target="_blank">Подробнее</a>
            </div>
            <?php
          }?>
        </div>
        <div class="direction__picture">
          <div class="direction__image">
            <?php if ($arSection['UF_SITE_LINK']) {
              ?>
              <a class="direction__clickable" href="<?=$arSection['UF_SITE_LINK']?>" target="_blank" aria-label="Перейти на сайт Энгельс"></a>
              <?php
            }?>
            <?php if (is_array($arSection['PICTURE'])){
              ?>
              <picture>
                <img src="<?=$arSection['PICTURE']['SRC']?>">
              </picture>
              <?php
            }?>
          </div>
        </div>
      </div>
      <?php
    }?>
  </div>
  <?php
}?>