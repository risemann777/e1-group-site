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

<div class="news">
  <div class="news__container">
    <div class="news__list">
      <?php foreach($arResult["ITEMS"] as $arItem) {
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
        <div class="news-card news__item">
          <div class="news-card__media">
            <div class="news-card__image">
              <?php if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])) {
                ?>
                <picture>
                  <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"/>
                </picture>
                <?php
              }?>
              <?php if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])) {
                ?>
                <a class="news-card__clickable" href="<?=$arItem["DETAIL_PAGE_URL"]?>" aria-label="Переход на страницу новости: <?=$arItem["NAME"]?>"></a>
                <?php
              }?>
            </div>
          </div>
          <div class="news-card__info">
            <?php if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]) {
              ?>
              <div class="news-card__date"><?=$arItem["DISPLAY_ACTIVE_FROM"]?></div>
              <?php
            }?>
            <?php if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]) {
              ?>
              <div class="news-card__title"><?=$arItem["NAME"]?></div>
              <?php
            }?>
          </div>
        </div>
        <?php
      }?>
    </div>
    <?php if($arParams["DISPLAY_BOTTOM_PAGER"]) {
      ?>
      <div class="news__pagination">
        <?=$arResult["NAV_STRING"]?>
      </div>
      <?php
    }?>
  </div>
</div>