<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
{
  die();
}
?>
</div>
<footer class="footer layout__footer">
  <div class="footer__connect">
    <div class="footer__connect-info">
      <div class="footer__connect-cta">Узнайте о сотрудничестве или задайте вопрос, заполнив форму.</div>
      <div class="footer__connect-contact"><span>Или напишите нам на почту</span><br><a
          href="mailto:e1group-info@mail.com">e1group-info@mail.com</a></div>
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
              "FORM_NAME" => "Связаться с нами",
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
  <div class="footer__bottom">
    <div class="footer__bottom-info">
      <div class="footer__bottom-copyright">Copyright © ООО «ДК РУ»</div>
      <div class="footer__bottom-address">125371, Россия, г. Москва, вн. тер. г. Муниципальный округ Покровское-Стрешнево, ш. Волоколамское, д. 116, офис 40</div>
    </div>
    <div class="footer__bottom-links"><a href="/privacy/">Политика конфиденциальности</a><a href="/approve/">Согласие на обработку персональных данных</a></div>
  </div>
</footer>
</div>
<div class="modal modal--zoom" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true" data-lenis-prevent="true">
  <div class="modal__backdrop" data-dismiss="modal"></div>
  <div class="modal__dialog modal__dialog--centered">
    <div class="modal__content">
      <button class="modal__close" type="button" data-dismiss="modal" aria-label="close"></button>
      <div class="modal__header"><h3 class="modal__title" id="contactModalLabel">Мы свяжемся с вами</h3>
        <div class="modal__subtitle">Оставьте ваши контакты и мы свяжемся с вами в ближайшее время</div>
      </div>
      <div class="modal__body">
        <form class="form  form--theme-default">
          <div class="form__body">
            <div class="form__field">
              <div class="form__input"><label><span class="form__label">Ваше имя</span><input class="form__control" type="text" name="user_name" placeholder="Ваше имя" autocomplete="off"></label>
                <div class="form__input-error"></div>
              </div>
            </div>
            <div class="form__field">
              <div class="form__input"><label><span class="form__label">Телефон</span><input
                    class="form__control" type="text" name="user_phone" placeholder="Телефон"
                    autocomplete="off"></label>
                <div class="form__input-error"></div>
              </div>
            </div>
            <div class="form__field">
              <div class="form__input"><label><span
                    class="form__label">E-mail</span><input class="form__control" type="text"
                                                            name="user_email" placeholder="E-mail"
                                                            autocomplete="off"></label>
              </div>
            </div>
            <div class="form__field">
              <div class="form__input"><label><span class="form__label">Комментарий</span><textarea
                    class="form__control form__control--textarea" name="comment"
                    placeholder="Комментарий"></textarea></label>
                <div class="form__input-error"></div>
              </div>
            </div>
          </div>
          <div class="form__footer">
            <button class="btn btn--primary" type="button">Отправить</button>
            <div class="form__policy">
              <div class="checkbox checkbox--policy"><label><input type="checkbox" name="policy">
                  <div class="checkbox__cr"></div>
                  <div class="checkbox__text">Нажимая на кнопку <a target="_blank" href="policy.html">вы
                      соглашаетесь</a> на обработку персональных данных и <a target="_blank"
                                                                             href="policy.html">подтверждаете
                      ознакомление</a> с политикой их обработки
                  </div>
                </label></div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal modal--zoom modal--video modal--xl" id="expertiseModal" tabindex="-1"
     aria-labelledby="expertiseModalLabel" aria-hidden="true" data-lenis-prevent="true">
  <div class="modal__backdrop" data-dismiss="modal"></div>
  <div class="modal__dialog modal__dialog--centered">
    <div class="modal__content">
      <button class="modal__close" type="button" data-dismiss="modal" aria-label="close"></button>
      <div class="modal__body">
        <div class="embed-responsive embed-responsive--16by9">
          <div class="embed-responsive__item">
            <video class="video video--16by9" width="1920" height="1080" controls poster="">
              <source type="video/mp4" src="">
            </video>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>