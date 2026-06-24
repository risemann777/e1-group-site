<?php
global $APPLICATION;
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");
$APPLICATION->SetPageProperty("layoutClasses", "layout--contacts");
$APPLICATION->SetPageProperty("title", "Контакты | Е1-Групп");
?>

  <div class="page-contact">
    <div class="page-contact__container">
      <div class="page-contact__list">
        <div class="page-contact__item page-contact__item--wide">
          <div class="page-contact__label">Юридический адрес:</div>
          <div class="page-contact__value">115035, <span>г. Москва</span>, внутригородская территория города
            федерального значения Муниципальный Округ Якиманка, <span>пер. 3-й Кадашевский</span>, <span>д. 7–9</span>,
            <span>стр. 1</span>, <span>помещ. 8/1</span>.
          </div>
        </div>
        <div class="page-contact__item">
          <div class="page-contact__label">Реквизиты:</div>
          <div class="page-contact__value">
            <div class="page-contact__details">
              <ul>
                <li><span>ИНН:</span> 9706060150</li>
                <li><span>ОГРН:</span> 1257700575274</li>
                <li><span>КПП:</span> 770601001</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="page-contact__item">
          <div class="page-contact__label">Наша почта:</div>
          <div class="page-contact__value"><a href="mailto:info@e1-group.ru">info@e1-group.ru</a></div>
        </div>
      </div>
      <div class="page-contact__map">
        <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A24f0309f43dd50815be6cc4c404e77d9c4ef0e92a89a9423ab5bb58e2b801dd3&amp;width=100%&amp;lang=ru_RU&amp;scroll=false"></script>
      </div>
    </div>
  </div>

<?php require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>