<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
{
  die();
}

/** @var CMain $APPLICATION */
?>
</div>
<footer class="footer layout__footer">
  <div class="footer__bg footer__bg--desktop">
    <img src="<?=$APPLICATION->GetTemplatePath("assets/images/footer_bg_desktop.png")?>" alt="">
  </div>
  <div class="footer__bg footer__bg--mobile">
    <img src="<?=$APPLICATION->GetTemplatePath("assets/images/footer_bg_mobile.png")?>" alt="">
  </div>
  <div class="footer__connect">
    <div class="footer__connect-info">
      <div class="footer__connect-cta">Стать партнером, задать вопрос, узнать о вакансиях</div>
      <div class="footer__connect-contact">
        <span>Обратитесь к нам на почту</span>
        <br>
        <a href="mailto:<?php include(Bitrix\Main\Application::getDocumentRoot() . $APPLICATION->GetTemplatePath("include_areas/inc.site_email.php"))?>">
          <?php $APPLICATION->IncludeComponent(
              "bitrix:main.include",
              "",
              Array(
                  "AREA_FILE_RECURSIVE" => "Y",
                  "AREA_FILE_SHOW" => "file",
                  "AREA_FILE_SUFFIX" => "inc",
                  "EDIT_TEMPLATE" => "",
                  "PATH" => $APPLICATION->GetTemplatePath("include_areas/inc.site_email.php")
              )
          );?>
        </a>
      </div>
    </div>
    <div class="footer__connect-form">
      <?php $APPLICATION->IncludeComponent(
          "ace.group:landing.feedback.form",
          ".default",
          array(
              "EMAIL_TO" => "admin@e1group.ru",
              "EVENT_MESSAGE_ID" => array(
                  0 => "24",
              ),
              "FORM_NAME" => "Связаться с нами (в футере)",
              "OK_TEXT" => "Спасибо, ваше сообщение принято.",
              "REQUIRED_FIELDS" => array(
                  0 => "NAME",
              ),
              "USE_CAPTCHA" => "Y",
              "USE_GOOGLE_RECAPTCHA" => "N",
              "COMPONENT_TEMPLATE" => ".default",
              "FORM_THEME" => "LIGHT",
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
  <div class="footer__middle">
    <div class="footer__middle-left">
      <div class="footer-address">
        <?php $APPLICATION->IncludeComponent(
            "bitrix:main.include",
            "",
            Array(
                "AREA_FILE_RECURSIVE" => "Y",
                "AREA_FILE_SHOW" => "file",
                "AREA_FILE_SUFFIX" => "inc",
                "EDIT_TEMPLATE" => "",
                "PATH" => $APPLICATION->GetTemplatePath("include_areas/inc.site_address.php")
            )
        );?>
      </div>
      <div class="footer-details">
        <div class="footer-details__item">
          <div class="footer-details__label">ИНН:</div>
          <div class="footer-details__value">9706060150</div>
        </div>
        <div class="footer-details__item">
          <div class="footer-details__label">ОГРН:</div>
          <div class="footer-details__value">1257700575274</div>
        </div>
        <div class="footer-details__item">
          <div class="footer-details__label">КПП:</div>
          <div class="footer-details__value">770601001</div>
        </div>
      </div>
    </div>
    <div class="footer__middle-right">
      <div class="footer-contact">
        <div class="footer-contact__item">
          <div class="footer-contact__label">Телефон:</div>
          <div class="footer-contact__value"><a href="tel:79000000000">+7 (900) 000-00-00</a></div>
        </div>
        <div class="footer-contact__item">
          <div class="footer-contact__label">Почта:</div>
          <div class="footer-contact__value"><a href="mailto:info@e1-group.ru">info@e1-group.ru</a></div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer__bottom">
    <div class="footer__bottom-info">
      <div class="footer__copyright">Copyright © АО «Е1 ГРУПП»</div>
    </div>
    <div class="footer__links">
      <a href="/privacy/">Политика конфиденциальности</a>
      <a href="/approve/">Согласие на обработку персональных данных</a>
    </div>
  </div>
</footer>
</div>
<?php include_once("include_areas/inc.modals.php")?>
</body>
</html>