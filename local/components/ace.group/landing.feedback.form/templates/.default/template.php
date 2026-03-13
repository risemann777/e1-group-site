<?php
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */

$submitButtonClassName = $arParams["FORM_THEME"] === 'light' ? "btn--secondary" : "btn--primary";
?>

<form action="<?=POST_FORM_ACTION_URI?>" method="POST" class="form form--theme-<?=$arParams["FORM_THEME"]?>">
<?=bitrix_sessid_post()?>
  <div class="form__body">
    <div class="form__field">
      <div class="form__input<?=(!empty($arResult["ERROR_MESSAGE"]["user_name"]) ? " form__input--error" : "")?>">
        <label>
          <span class="form__label">
            <?=GetMessage("MFT_NAME")?><?php if(empty($arParams["REQUIRED_FIELDS"]) || in_array("NAME", $arParams["REQUIRED_FIELDS"])):?><span class="mf-req">*</span><?php endif?>
          </span>
          <input
            type="text"
            name="user_name"
            class="form__control"
            value="<?=$arResult["AUTHOR_NAME"]?>"
            placeholder="<?=GetMessage("MFT_NAME")?><?php if(empty($arParams["REQUIRED_FIELDS"]) || in_array("NAME", $arParams["REQUIRED_FIELDS"])):?> *<?php endif?>"
          >
        </label>
        <?php
        if(!empty($arResult["ERROR_MESSAGE"]["user_name"])) {
          ?>
          <div class="form__input-error"><?=$arResult["ERROR_MESSAGE"]["user_name"]?></div>
          <?php
        }
        ?>
      </div>
    </div>
    <div class="form__field">
      <div class="form__input<?=(!empty($arResult["ERROR_MESSAGE"]["user_phone"]) ? " form__input--error" : "")?>">
        <label>
          <span class="form__label">
            <?=GetMessage("MFT_PHONE")?><?php if(empty($arParams["REQUIRED_FIELDS"]) || in_array("NAME", $arParams["REQUIRED_FIELDS"])):?><span class="mf-req">*</span><?php endif?>
          </span>
          <input
            type="text"
            name="user_phone"
            class="form__control"
            value="<?=$arResult["AUTHOR_PHONE"]?>"
            placeholder="<?=GetMessage("MFT_PHONE")?><?php if(empty($arParams["REQUIRED_FIELDS"]) || in_array("PHONE", $arParams["REQUIRED_FIELDS"])):?> *<?php endif?>"
          >
        </label>
        <?php
        if(!empty($arResult["ERROR_MESSAGE"]["user_phone"])) {
          ?>
          <div class="form__input-error"><?=$arResult["ERROR_MESSAGE"]["user_phone"]?></div>
          <?php
        }
        ?>
      </div>
    </div>
    <div class="form__field">
      <div class="form__input<?=(!empty($arResult["ERROR_MESSAGE"]["user_email"]) ? " form__input--error" : "")?>">
        <label>
          <span class="form__label">
            <?=GetMessage("MFT_EMAIL")?><?php if(empty($arParams["REQUIRED_FIELDS"]) || in_array("EMAIL", $arParams["REQUIRED_FIELDS"])):?><span class="mf-req">*</span><?php endif?>
          </span>
          <input
            type="text"
            name="user_email"
            class="form__control"
            value="<?=$arResult["AUTHOR_EMAIL"]?>"
            placeholder="<?=GetMessage("MFT_EMAIL")?><?php if(empty($arParams["REQUIRED_FIELDS"]) || in_array("EMAIL", $arParams["REQUIRED_FIELDS"])):?> *<?php endif?>"
          >
        </label>
        <?php
        if(!empty($arResult["ERROR_MESSAGE"]["user_email"])) {
          ?>
          <div class="form__input-error"><?=$arResult["ERROR_MESSAGE"]["user_email"]?></div>
          <?php
        }
        ?>
      </div>
    </div>
    <div class="form__field">
      <div class="form__input<?=(!empty($arResult["ERROR_MESSAGE"]["user_comment"]) ? " form__input--error" : "")?>">
        <label>
          <span class="form__label">
            <?=GetMessage("MFT_COMMENT")?><?php if(empty($arParams["REQUIRED_FIELDS"]) || in_array("COMMENT", $arParams["REQUIRED_FIELDS"])):?><span class="mf-req">*</span><?php endif?>
          </span>
          <textarea
              name="user_comment"
              class="form__control form__control--textarea"
              placeholder="<?=GetMessage("MFT_COMMENT_PLACEHOLDER")?><?php if(empty($arParams["REQUIRED_FIELDS"]) || in_array("COMMENT", $arParams["REQUIRED_FIELDS"])):?> *<?php endif?>"
          ><?=($arResult["AUTHOR_COMMENT"] ?? '')?></textarea>
        </label>
        <?php
        if(!empty($arResult["ERROR_MESSAGE"]["user_comment"])) {
          ?>
          <div class="form__input-error"><?=$arResult["ERROR_MESSAGE"]["user_comment"]?></div>
          <?php
        }
        ?>
      </div>
    </div>
    <?php if($arParams["USE_CAPTCHA"] == "Y"):?>
      <div class="form__field">
        <div class="form__captcha">
          <div class="form__captcha-title"><?=GetMessage("MFT_CAPTCHA")?></div>
          <input type="hidden" name="captcha_sid" value="<?=$arResult["capCode"]?>">
          <img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["capCode"]?>" width="180" height="40" alt="CAPTCHA">
        </div>
        <div class="form__input<?=(!empty($arResult["ERROR_MESSAGE"]["captcha"]) ? " form__input--error" : "")?>">
          <label>
            <span class="form__label"><?=GetMessage("MFT_CAPTCHA_CODE")?><span class="mf-req">*</span></span>
            <input
                type="text"
                name="captcha_word"
                value=""
                class="form__control"
                placeholder="<?=GetMessage("MFT_CAPTCHA_CODE")?> *"
            >
          </label>
          <?php
          if(!empty($arResult["ERROR_MESSAGE"]["captcha"])) {
            ?>
            <div class="form__input-error"><?=$arResult["ERROR_MESSAGE"]["captcha"]?></div>
            <?php
          }
          ?>
        </div>
      </div>
    <?php endif;?>
  </div>
  <div class="form__footer">
    <input type="hidden" name="PARAMS_HASH" value="<?=$arResult["PARAMS_HASH"]?>">
    <?php if(!empty($arResult["OK_MESSAGE"])) {
      ?>
      <div class="form__ok"><?=$arResult["OK_MESSAGE"]?></div>
      <?php
    }
    if (!empty($arResult["ERROR_MESSAGE"]["gRecaptcha"]) || !empty($arResult["ERROR_MESSAGE"]["policy"])) {
      ?>
      <div class="form__errors">
        <?php
        if(!empty($arResult["ERROR_MESSAGE"]["gRecaptcha"])) {
          ?>
          <p><?=$arResult["ERROR_MESSAGE"]["gRecaptcha"]?></p>
          <?php
        }
        if(!empty($arResult["ERROR_MESSAGE"]["policy"])) {
          ?>
          <p><?=$arResult["ERROR_MESSAGE"]["policy"]?></p>
          <?php
        }
        ?>
      </div>
      <?php
    }
    ?>
    <input type="submit" class="btn <?=$submitButtonClassName?>" name="submit" value="<?=GetMessage("MFT_SUBMIT")?>">
    <div class="form__policy">
      <div class="checkbox checkbox--policy">
        <label>
          <input type="checkbox" name="policy"<?php if($arResult["POLICY"] == "Y") echo " checked";?>>
          <span class="checkbox__cr"></span>
          <span class="checkbox__text">Соглашаюсь с <a target="_blank" href="/policy/">политикой обработки персональных данных</a></span>
        </label>
      </div>
      <?php if ($arParams["USE_GOOGLE_RECAPTCHA"] == "Y") {
        ?>
        <p>Данный сайт защищен reCAPTCHA и на него распространяются <a href="https://www.google.com/intl/ru/policies/privacy/" target="_blank" rel="noopener noreferrer">Политика конфиденциальности</a> <span>и <a href="https://www.google.com/intl/ru/policies/terms/" target="_blank" rel="noopener noreferrer">Условия использования</a></span> сервисов Google.</p>
        <?php
      }?>
    </div>
  </div>
</form>
