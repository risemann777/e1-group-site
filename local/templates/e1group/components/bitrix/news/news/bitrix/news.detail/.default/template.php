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
<div class="news-detail__section">
  <div class="news-detail__container">
    <?if($arParams["DISPLAY_DATE"]!="N" && $arResult["DISPLAY_ACTIVE_FROM"]):?>
      <div class="news-detail__date"><?=$arResult["DISPLAY_ACTIVE_FROM"]?></div>
    <?endif;?>
    <?php if($arParams["DISPLAY_PICTURE"] != "N" && is_array($arResult["DETAIL_PICTURE"])) {
      $resizedDetailPicture = CFile::ResizeImageGet($arResult["DETAIL_PICTURE"]['ID'], ['width'=>2160, 'height'=>2160], BX_RESIZE_IMAGE_PROPORTIONAL, true);
      $webPDetailPicture = SiteUtil::getWebP($resizedDetailPicture["src"], ['QUALITY' => IMG_QUALITY]);
      ?>
      <div class="news-detail__picture">
        <picture>
          <?php if($webPDetailPicture) {
            ?>
            <source srcset="<?=$webPDetailPicture['SRC']?>" type="image/webp">
            <?php
          }?>
          <img
              class="detail_picture"
              src="<?=$resizedDetailPicture["src"]?>"
              width="<?=$resizedDetailPicture["width"]?>"
              height="<?=$resizedDetailPicture["height"]?>"
              alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"
              title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
          />
        </picture>
      </div>
      <?php
    }?>
    <div class="news-detail__content">
      <?php if($arResult["IPROPERTY_VALUES"]["ELEMENT_PAGE_TITLE"]) {
        ?>
          <h1><?=$arResult["IPROPERTY_VALUES"]["ELEMENT_PAGE_TITLE"]?></h1>
        <?php
      } else {
        if($arParams["DISPLAY_NAME"]!="N" && $arResult["NAME"]) {
          ?>
          <h1><?=$arResult["NAME"]?></h1>
          <?php
        }
      }?>
      <?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && ($arResult["FIELDS"]["PREVIEW_TEXT"] ?? '')):?>
        <p><?=$arResult["FIELDS"]["PREVIEW_TEXT"];unset($arResult["FIELDS"]["PREVIEW_TEXT"]);?></p>
      <?endif;?>
      <?if($arResult["DETAIL_TEXT"] <> ''):?>
        <?echo $arResult["DETAIL_TEXT"];?>
      <?else:?>
        <?echo $arResult["PREVIEW_TEXT"];?>
      <?endif?>
    </div>
  </div>
</div>

<?php if(!empty($arResult["GALLERY"])) {
  ?>
  <div class="news-detail__section">
    <div class="news-detail__container">
      <div class="gallery">
        <div class="gallery__list">
          <?php foreach($arResult["GALLERY"] as $arGalleryItem) {
            ?>
            <div class="gallery__item">
              <figure class="gallery__figure">
                <a href="<?=$arGalleryItem['BIG']['SRC']?>" data-caption="<?=$arGalleryItem['DESCRIPTION']?>" data-fancybox="galleryID_<?=$arResult['ID']?>">
                  <picture class="gallery__picture">
                    <?php if($arGalleryItem['SMALL']['WEBP']) {
                      ?>
                      <source srcset="<?=$arGalleryItem['SMALL']['WEBP']?>" type="image/webp">
                      <?php
                    }?>
                    <img
                        src="<?=$arGalleryItem['SMALL']['SRC']?>"
                        width="<?=$arGalleryItem['SMALL']['WIDTH']?>"
                        height="<?=$arGalleryItem['SMALL']['HEIGHT']?>"
                        alt="<?=$arGalleryItem['DESCRIPTION']?>"
                    />
                  </picture>
                </a>
              </figure>
            </div>
            <?php
          }?>
        </div>
      </div>
    </div>
  </div>
  <?php
}?>