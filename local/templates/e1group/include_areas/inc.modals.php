<?php
if (!defined ('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
{
  die();
}

/** @var CMain $APPLICATION */
?>

<div class="modal modal--zoom" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true" data-lenis-prevent="true">
  <div class="modal__backdrop" data-dismiss="modal"></div>
  <div class="modal__dialog modal__dialog--centered">
    <div class="modal__content">
      <button class="modal__close" type="button" data-dismiss="modal" aria-label="close"></button>
      <div class="modal__header">
        <h3 class="modal__title" id="contactModalLabel">Мы свяжемся с вами</h3>
        <div class="modal__subtitle">Оставьте ваши контакты и мы свяжемся с вами в ближайшее время</div>
      </div>
      <div class="modal__body">
        <?php $APPLICATION->IncludeComponent(
            "ace.group:landing.feedback.form",
            ".default",
            array(
                "EMAIL_TO" => "info@e1-group.ru",
                "EVENT_MESSAGE_ID" => array(
                    0 => "24",
                ),
                "FORM_NAME" => "Связаться с нами в модали",
                "OK_TEXT" => "Спасибо, ваше сообщение принято.",
                "REQUIRED_FIELDS" => array(
                    0 => "NAME",
                    1 => "PHONE",
                    2 => "EMAIL",
                    3 => "ADDRESS_CITY",
                ),
                "USE_CAPTCHA" => "Y",
                "USE_GOOGLE_RECAPTCHA" => "N",
                "COMPONENT_TEMPLATE" => ".default",
                "FORM_THEME" => "DARK",
                "AJAX_MODE" => "Y",
                "AJAX_OPTION_HISTORY" => "N",
                "AJAX_OPTION_JUMP" => "N",
                "AJAX_OPTION_SHADOW" => "Y",
                "AJAX_OPTION_STYLE" => "Y",
                "AJAX_OPTION_ADDITIONAL" => "FOOTER_FEEDBACK_FORM",
            ),
            false
        );?>
      </div>
    </div>
  </div>
</div>
