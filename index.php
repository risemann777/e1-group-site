<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("E1-Group");
?>

<div class="hero">
  <div class="hero__image">
    <picture>
      <source media="(min-width:1280px)" srcset="" data-srcset="<?=SITE_TEMPLATE_PATH?>/assets/images/hero_w2000.jpg">
      <img src="" data-src="<?=SITE_TEMPLATE_PATH?>/assets/images/hero_w2000.jpg" role="presentation" alt=""></picture>
  </div>
  <div class="hero__container">
    <div class="hero__content">
      <div class="hero__info">
        <div class="hero__title">E1-Group</div>
        <div class="hero__description">Группа компаний, специализирующихся на производстве и продаже
          решений для строительства, включая электроинструмент и строительную технику, а также
          IT-решения для управления парком малой строительной механизации.
        </div>
      </div>
      <div class="hero__controls">
        <button class="btn btn--secondary" type="button" data-toggle="modal" data-target="#contactModal">Предложить сотрудничество</button>
        <button class="btn btn--outline-secondary" type="button" data-toggle="modal" data-target="#contactModal">О компании</button>
      </div>
    </div>
  </div>
</div>
<section class="advantage" id="advantage">
  <div class="advantage__container">
    <div class="advantage__col">
      <div class="advantage__info">
        <div class="advantage__title"><span>E1-Group</span></div>
        <div class="advantage__description">Динамично развивающаяся группа компаний, специализирующаяся
          на производстве и продажах решений для строительства, таких как электроинструмент,
          строительная техника, садовая техника и IT решений для управления парком средств малой
          строительной механизации.
        </div>
      </div>
      <div class="advantage__controls">
        <button class="btn btn--primary header__button" type="button" data-toggle="modal"
                data-target="#contactModal">Оставить заявку
        </button>
      </div>
    </div>
    <div class="advantage__col">
      <div class="advantage__list">
        <div class="advantage__item">
          <div class="advantage__item-name">IT Решения</div>
          <div class="advantage__item-text">Решения для управления парком средств малой строительной
            механизации
          </div>
        </div>
        <div class="advantage__item">
          <div class="advantage__item-name">Дистрибуция</div>
          <div class="advantage__item-text">Работа с крупнейшими игроками рынка электроинструментов и
            крупными конечными потребителями
          </div>
        </div>
        <div class="advantage__item">
          <div class="advantage__item-name">Операционная модель</div>
          <div class="advantage__item-text">Эффективная логистика в партнерстве с NOYTECH Сильная
            команда с многолетним опытом на рынке электроинструмента производственная экспертиза на
            заводе в г. Энгельс
          </div>
        </div>
        <div class="advantage__item">
          <div class="advantage__item-name">Пользователи</div>
          <div class="advantage__item-text">Продуктовый портфель, покрывающий потребности широкого
            круга пользователей от DIY энтузиастов до B2G
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="partnership" id="partnership">
  <div class="partnership__container">
    <div class="partnership__content">
      <div class="partnership__decor"><img src="<?=SITE_TEMPLATE_PATH?>/assets/images/partner_decor.svg" alt=""></div>
      <div class="partnership__info">
        <div class="partnership__title">Стратегическое партнерство с профессионалами в IT (SOFLTINE),
          логистике (NOYTECH company) и производстве Электроинструмента (ENGELS)
        </div>
        <div class="partnership__description"><p>С целью предоставить качественные продукты и сервисные
            решения для профессионалов в России.</p></div>
      </div>
      <div class="partnership__controls">
        <button class="btn btn--secondary header__button" type="button" data-toggle="modal"
                data-target="#contactModal">Предложить сотрудничество
        </button>
      </div>
      <div class="partnership__list">
        <div class="partnership__item">
          <picture><img class="partnership__image" src="<?=SITE_TEMPLATE_PATH?>/assets/images/partners/partner_dfc.png"></picture>
        </div>
        <div class="partnership__item">
          <picture><img class="partnership__image" src="<?=SITE_TEMPLATE_PATH?>/assets/images/partners/partner_softline.png">
          </picture>
        </div>
        <div class="partnership__item">
          <picture><img class="partnership__image" src="<?=SITE_TEMPLATE_PATH?>/assets/images/partners/partner_noytech.png">
          </picture>
        </div>
        <div class="partnership__item">
          <picture><img class="partnership__image" src="<?=SITE_TEMPLATE_PATH?>/assets/images/partners/partner_engels.png"></picture>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="news news--index news--slider" id="news">
  <div class="news__container">
    <div class="news__heading">
      <div class="news__title">Медиа компании</div>
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
        <div class="swiper-slide">
          <div class="news-card news__item">
            <div class="news-card__media">
              <div class="news-card__image"><a class="news-card__clickable"
                                               href="#newsDetail"></a>
                <picture><img src="<?=SITE_TEMPLATE_PATH?>/assets/images/news/news-item-1.jpg"></picture>
              </div>
            </div>
            <div class="news-card__info">
              <div class="news-card__date">20.02.26</div>
              <div class="news-card__title">«ЭНГЕЛЬС» вместо Bosch: в Саратовской области
                возрождается производство отечественного профессионального электроинструмента
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="news-card news__item">
            <div class="news-card__media">
              <div class="news-card__image"><a class="news-card__clickable"
                                               href="#newsDetail"></a>
                <picture><img src="<?=SITE_TEMPLATE_PATH?>/assets/images/news/news-item-2.jpg"></picture>
              </div>
            </div>
            <div class="news-card__info">
              <div class="news-card__date">20.02.26</div>
              <div class="news-card__title">«ЭНГЕЛЬС» вместо Bosch: в Саратовской области
                возрождается производство отечественного профессионального электроинструмента
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="news-card news__item">
            <div class="news-card__media">
              <div class="news-card__image">
                <picture><img src="<?=SITE_TEMPLATE_PATH?>/assets/images/news/news-item-3.jpg"></picture>
              </div>
            </div>
            <div class="news-card__info">
              <div class="news-card__date">20.02.26</div>
              <div class="news-card__title">«ЭНГЕЛЬС» вместо Bosch: в Саратовской области
                возрождается производство отечественного профессионального электроинструмента
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="news-card news__item">
            <div class="news-card__media">
              <div class="news-card__image">
                <picture><img src="<?=SITE_TEMPLATE_PATH?>/assets/images/news/news-item-4.jpg"></picture>
              </div>
            </div>
            <div class="news-card__info">
              <div class="news-card__date">20.02.26</div>
              <div class="news-card__title">«ЭНГЕЛЬС» вместо Bosch: в Саратовской области
                возрождается производство отечественного профессионального электроинструмента
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>