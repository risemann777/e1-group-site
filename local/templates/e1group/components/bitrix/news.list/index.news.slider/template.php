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

<section class="news news--index news--slider" id="news">
  <div class="news__container">
    <div class="news__heading">
      <h2 class="news__title"><?=GetMessage("NEWS_TITLE")?></h2>
      <div class="news__controls">
        <div class="news__nav news__nav-prev">
          <svg class="svg-icon" viewBox="0 0 24 24" width="24" height="24">
            <use xlink:href="#svg-icon-arrow-left"></use>
          </svg>
        </div>
        <div class="news__nav news__nav-next">
          <svg class="svg-icon" viewBox="0 0 24 24" width="24" height="24">
            <use xlink:href="#svg-icon-arrow-right"></use>
          </svg>
        </div>
      </div>
    </div>
    <div class="news__slider swiper" id="newsSlider">
      <div class="swiper-wrapper">
        <?php if (!empty($arResult["ITEMS"])) {
          foreach($arResult["ITEMS"] as $arItem) {
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>
            <div class="swiper-slide">
              <div class="news-card news__item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                <div class="news-card__media">
                  <div class="news-card__image">
                    <?php if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])) {
                      ?>
                      <a class="news-card__clickable" href="<?=$arItem["DETAIL_PAGE_URL"]?>"></a>
                      <?php
                    }?>
                    <?php if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])) {
                      ?>
                      <picture>
                        <img
                          src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
                          alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
                          title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
                        />
                      </picture>
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
                    <h3 class="news-card__title"><?=$arItem["NAME"]?></h3>
                    <?php
                  }?>
                </div>
              </div>
            </div>
            <?php
          }
        }?>
      </div>
    </div>
  </div>
</section>
