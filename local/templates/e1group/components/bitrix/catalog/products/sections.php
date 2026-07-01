<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

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

$sectionListParams = array(
	"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
	"IBLOCK_ID" => $arParams["IBLOCK_ID"],
	"CACHE_TYPE" => $arParams["CACHE_TYPE"],
	"CACHE_TIME" => $arParams["CACHE_TIME"],
	"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
	"COUNT_ELEMENTS" => $arParams["SECTION_COUNT_ELEMENTS"],
	"TOP_DEPTH" => $arParams["SECTION_TOP_DEPTH"],
	"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
	"VIEW_MODE" => $arParams["SECTIONS_VIEW_MODE"],
	"SHOW_PARENT_NAME" => $arParams["SECTIONS_SHOW_PARENT_NAME"],
	"HIDE_SECTION_NAME" => ($arParams["SECTIONS_HIDE_SECTION_NAME"] ?? "N"),
	"ADD_SECTIONS_CHAIN" => ($arParams["ADD_SECTIONS_CHAIN"] ?? '')
);
if ($sectionListParams["COUNT_ELEMENTS"] === "Y")
{
	$sectionListParams["COUNT_ELEMENTS_FILTER"] = "CNT_ACTIVE";
	if ($arParams["HIDE_NOT_AVAILABLE"] == "Y")
	{
		$sectionListParams["COUNT_ELEMENTS_FILTER"] = "CNT_AVAILABLE";
	}
}
?>
  <div class="direction direction--page">
    <div class="direction__container">
      <div class="direction__stat">
        <div class="stat">
          <div class="stat__list">
            <div class="stat__item">
              <div class="stat__label">Экспертиза команды на рынке электроинструмента</div>
              <div class="stat__info">
                <div class="stat__value">>30</div>
                <div class="stat__term">лет</div>
              </div>
            </div>
            <div class="stat__item">
              <div class="stat__label">Производственная мощность завода ЭНГЕЛЬС</div>
              <div class="stat__info">
                <div class="stat__value">>1.5</div>
                <div class="stat__term">млн.</div>
              </div>
            </div>
            <div class="stat__item">
              <div class="stat__label">Продажи электроинструмента DongCheng по всему миру</div>
              <div class="stat__info">
                <div class="stat__value">>30</div>
                <div class="stat__term">млн.</div>
              </div>
            </div>
            <div class="stat__item">
              <div class="stat__label">Брендов для профессионалов в портфолио</div>
              <div class="stat__info">
                <div class="stat__value">>5</div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php $APPLICATION->IncludeComponent(
          "bitrix:catalog.section.list",
          "",
          $sectionListParams,
          $component,
          ($arParams["SHOW_TOP_ELEMENTS"] !== "N" ? array("HIDE_ICONS" => "Y") : array())
      );
      unset($sectionListParams);?>
    </div>
  </div>
<?php
