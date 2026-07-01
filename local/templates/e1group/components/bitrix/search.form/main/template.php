<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
{
	die();
}
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
$this->setFrameMode(true);?>

<form action="<?=$arResult['FORM_ACTION']?>" class="form form--search jsSearchForm">
  <div class="form__field">
    <div class="form__input">
	    <input type="text" name="q" value="" class="form__control" placeholder="<?=GetMessage('BSF_T_SEARCH_INPUT_PLACEHOLDER')?>" maxlength="255" />
      <button class="form__search-btn" name="s" type="submit">
        <svg class="svg-icon" viewBox="0 0 24 24" width="24" height="24">
          <use href="#svg-icon-search"></use>
        </svg>
      </button>
    </div>
  </div>
</form>
