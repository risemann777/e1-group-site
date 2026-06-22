<?php
global $APPLICATION;
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Продукция и услуги");
$APPLICATION->SetDirProperty("headline_text", "АО «Е1 Групп» объединяет производство, дистрибуцию и сервис профессионального электроинструмента и строительного оборудования. Ключевые направления: ЭНГЕЛЬС, DongCheng и Distribution for Construction.");
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
      <div class="direction__list">
        <div class="direction__item">
          <div class="direction__info">
            <div class="direction__content">
              <div class="direction__logo">
                <img src="/upload/main/images/brands/brand_engels.png">
              </div>
              <div class="direction__description">Российский бренд профессионального электроинструмента от завода-
                производителя в г. Энгельс. Производство, разработка продукта, сервис, запчасти и гарантия.
              </div>
            </div>
            <div class="direction__button"><a class="btn btn--outline-primary btn--sm" href="https://engelstool.ru" target="_blank">Подробнее</a>
            </div>
          </div>
          <div class="direction__picture">
            <div class="direction__image"><a class="direction__clickable" href="https://engelstool.ru" target="_blank" aria-label="Перейти на сайт Энгельс"></a>
              <picture>
                <img src="/upload/main/images/directions/direction_1.jpg">
              </picture>
            </div>
          </div>
        </div>
        <div class="direction__item">
          <div class="direction__info">
            <div class="direction__content">
              <div class="direction__logo"><img src="/upload/main/images/brands/brand_dong_cheng.png"></div>
              <div class="direction__description">Профессиональный электроинструмент DongCheng. Широкий ассортимент,
                надежный сервис и гарантийная поддержка на официальном сайте бренда в России.
              </div>
            </div>
            <div class="direction__button">
              <a class="btn btn--outline-primary btn--sm" href="https://dongchengtool.ru" target="_blank">Подробнее</a>
            </div>
          </div>
          <div class="direction__picture">
            <div class="direction__image">
              <a class="direction__clickable" href="https://dongchengtool.ru" target="_blank" aria-label="Перейти на сайт DongCheng"></a>
              <picture>
                <img src="/upload/main/images/directions/direction_2.jpg">
              </picture>
            </div>
          </div>
        </div>
        <div class="direction__item">
          <div class="direction__info">
            <div class="direction__content">
              <div class="direction__logo">
                <img src="/upload/main/images/brands/brand_dfc.png">
              </div>
              <div class="direction__description">Поставщик строительного оборудования, электроинструмента,
                садово-парковой техники и сервисных услуг для профессионального рынка.
              </div>
            </div>
            <div class="direction__button">
              <a class="btn btn--outline-primary btn--sm" href="https://dctool.ru" target="_blank">Подробнее</a>
            </div>
          </div>
          <div class="direction__picture">
            <div class="direction__image">
              <a class="direction__clickable" href="https://dctool.ru" target="_blank" aria-label="Перейти на сайт Distribution For Construction"></a>
              <picture>
                <img src="/upload/main/images/directions/direction_3.jpg">
              </picture>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>