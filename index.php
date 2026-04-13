<?php
/** @var CMain $APPLICATION */
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("NOT_SHOW_NAV_CHAIN", "Y");
$APPLICATION->SetTitle("E1-Group");
?>

<div class="hero">
  <div class="hero__image">
    <picture>
      <source media="(min-width:1280px)" srcset="<?=SITE_TEMPLATE_PATH?>/assets/images/hero_w2000.jpg">
      <img src="<?=SITE_TEMPLATE_PATH?>/assets/images/hero_w2000.jpg" role="presentation" alt=""></picture>
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
        <a href="#advantage" data-smooth-scroll="true" class="btn btn--outline-secondary">О компании</a>
      </div>
    </div>
  </div>
</div>
  <section class="products" id="products">
    <div class="products__container">
      <div class="products__col">
        <div class="products__title">Продукция и услуги</div>
        <div class="products__description">Команда профессионалов с опытом работы на рынке
          Электроинструментов более 15 лет. Мы оказываем полный спектр услуг по обслуживанию и
          предоставлению электроинструмента.
        </div>
        <div class="solutions">
          <div class="solutions__title">Решения от Е1 Групп:</div>
          <div class="solutions__list">
            <div class="solutions__item"><img src="<?=SITE_TEMPLATE_PATH?>/assets/images/solutions/solution_1.png"></div>
            <div class="solutions__item"><img src="<?=SITE_TEMPLATE_PATH?>/assets/images/solutions/solution_2.png"></div>
            <div class="solutions__item"><img src="<?=SITE_TEMPLATE_PATH?>/assets/images/solutions/solution_3.png"></div>
          </div>
        </div>
      </div>
      <div class="products__col">
        <div class="accordion">
          <div class="accordion__list">
            <div class="accordion__item">
              <div class="accordion__head">
                <div class="accordion__info">
                  <div class="accordion__name">DongCheng</div>
                </div>
                <div class="accordion__arrow">
                  <svg class="svg-icon" viewBox="0 0 24 24" width="24" height="24">
                    <use xlink:href="#svg-accordion-arrow"></use>
                  </svg>
                </div>
              </div>
              <div class="accordion__body">
                <div class="accordion__content"><p>DongCheng – бренд профессиональных
                    электроинструментов, ориентированный на качество. Продукция проходит строгий
                    контроль от сырья до безопасности. Компания стремится стать лидером в инновациях
                    и качестве. Миссия – непрерывное совершенствование, инновации и
                    функциональность.</p>
                  <p>Сайт: <a target="_blank" href="https://www.dongchengtool.ru">www.dongchengtool.ru</a>
                  </p>
                  <p>Почта: <a href="mailto:info@dongchengtool.ru">info@dongchengtool.ru</a></p>
                </div>
              </div>
            </div>
            <div class="accordion__item">
              <div class="accordion__head">
                <div class="accordion__info">
                  <div class="accordion__name">ЭНГЕЛЬС</div>
                </div>
                <div class="accordion__arrow">
                  <svg class="svg-icon" viewBox="0 0 24 24" width="24" height="24">
                    <use xlink:href="#svg-accordion-arrow"></use>
                  </svg>
                </div>
              </div>
              <div class="accordion__body">
                <div class="accordion__content"><p>Завод в Энгельсе производит инструменты для
                    России и Европы, соблюдая высокие стандарты качества. Предприятие полностью
                    контролирует производство — от разработки пресс-форм до сборки. Завод с высоким
                    уровнем локализации и повышенным ресурсом на базе бывшего завода Бош в г.
                    Энгельс. Оснащен современным технологическим центром и предлагает надежные,
                    локализованные решения.</p>
                  <p>Сайт: <a target="_blank" href="https://engelstool.ru/">engelstool.ru</a></p>
                  <p>Почта: <a href="mailto:info@engelstool.ru">info@engelstool.ru</a></p></div>
              </div>
            </div>
            <div class="accordion__item">
              <div class="accordion__head">
                <div class="accordion__info">
                  <div class="accordion__name">Distribution For Construction</div>
                </div>
                <div class="accordion__arrow">
                  <svg class="svg-icon" viewBox="0 0 24 24" width="24" height="24">
                    <use xlink:href="#svg-accordion-arrow"></use>
                  </svg>
                </div>
              </div>
              <div class="accordion__body">
                <div class="accordion__content"><p>Поставщик строительного оборудования,
                    электроинструментов, садово-парковой техники и сервисных услуг. <br>Является
                    эксклюзивным дистрибьютером Международная экспертиза команды Distribution For
                    Construction в области продукта, продаж, маркетинга, процессов, технической и
                    сервисной поддержки продукта в совокупности с 15 летним успешным опытом на рынке
                    делает возможным выведение нового профессионального электроинструмента в России,
                    обеспечивая высокие стандарты качества, надежности и клиентского сервиса.</p>
                  <p>Сайт: <a target="_blank" href="https://dctool.ru/">dctool.ru</a></p>
                  <p>Почта: <a href="mailto:dcru-info@mail.ru">dcru-info@mail.ru</a></p></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="partnership" id="partnership">
    <div class="partnership__container">
      <div class="partnership__content">
        <div class="partnership__decor"><img src="<?=SITE_TEMPLATE_PATH?>/assets/images/partner_decor.svg"></div>
        <div class="partnership__info">
          <div class="partnership__title">Стратегическое партнерство с профессионалами в IT (SOFTLINE),
            логистике (NOYTECH Supply Chain Solutions) и производстве Электроинструмента (ENGELS)
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
          <div class="partnership__item"><img class="partnership__image" src="/upload/main/images/partners/partner_dfc.png" alt=""></div>
          <div class="partnership__item"><img class="partnership__image" src="/upload/main/images/partners/partner_softline.png" alt=""></div>
          <div class="partnership__item"><img class="partnership__image" src="/upload/main/images/partners/partner_noytech.png" alt=""></div>
          <div class="partnership__item"><img class="partnership__image" src="/upload/main/images/partners/partner_engels.png" alt=""></div>
          <div class="partnership__item"><img class="partnership__image" src="/upload/main/images/partners/partner_dfc.png" alt=""></div>
          <div class="partnership__item"><img class="partnership__image" src="/upload/main/images/partners/partner_softline.png" alt=""></div>
          <div class="partnership__item"><img class="partnership__image" src="/upload/main/images/partners/partner_noytech.png" alt=""></div>
          <div class="partnership__item"><img class="partnership__image" src="/upload/main/images/partners/partner_engels.png" alt=""></div>
        </div>
      </div>
    </div>
  </section>
  <section class="advantage" id="advantage">
    <div class="advantage__container">
      <div class="advantage__col">
        <div class="advantage__info">
          <div class="advantage__label">Профессиональный электроинструмент от:</div>
          <div class="advantage__logo"><img src="<?=SITE_TEMPLATE_PATH?>/assets/images/logo_writing_black.svg"></div>
          <div class="advantage__description">Динамично развивающаяся Группа Компаний, специализирующаяся
            на производстве и продажах решений для строительства, таких как электроинструмент,
            строительная техника, садовая техника и IT решений для управления парком средств малой
            строительной механизации.
          </div>
        </div>
        <div class="advantage__controls"><a class="btn btn--primary" href="#products" data-smooth-scroll>Продукция
            и услуги</a>
          <button class="btn btn--outline-primary header__button" type="button" data-toggle="modal"
                  data-target="#contactModal">Связаться с нами
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
            <div class="advantage__item-text">Эффективная логистика и партнерство с NOYTECH. Опытная
              команда и производственная экспертиза
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
  <section class="career" id="career">
    <div class="career__container">
      <div class="career__col">
        <div class="career__title">Стройте карьеру с нами</div>
        <div class="career__description"><p>Команда «Е1-Групп» — сплоченный коллектив с международной
            экспертизой в области продукта, продаж, маркетинга, процессов, технической и сервисной поддержки
            продукта. Приглашаем стать его частью!</p>
          <p>Чтобы ознакомиться с текущими вакансиями, пожалуйста перейдите в профиль компании на
            HeadHunter. Там вы найдете подробную информацию о доступных возможностях! Будем рады видеть
            Вас в нашем офисе!</p></div>
        <div class="career__controls"><a class="btn btn--primary" href="https://hh.ru">Смотреть вакансии на
            HH</a></div>
      </div>
      <div class="career__col">
        <div class="career__pic"><img src="/upload/main/images/business-team-working-min.jpg"></div>
      </div>
    </div>
  </section>


<?php $APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "index.news.slider",
    array(
        "ACTIVE_DATE_FORMAT" => "d.m.Y",
        "ADD_SECTIONS_CHAIN" => "N",
        "AJAX_MODE" => "N",
        "AJAX_OPTION_ADDITIONAL" => "",
        "AJAX_OPTION_HISTORY" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "N",
        "CACHE_FILTER" => "N",
        "CACHE_GROUPS" => "Y",
        "CACHE_TIME" => "36000000",
        "CACHE_TYPE" => "A",
        "CHECK_DATES" => "Y",
        "DETAIL_URL" => "",
        "DISPLAY_BOTTOM_PAGER" => "N",
        "DISPLAY_DATE" => "Y",
        "DISPLAY_NAME" => "Y",
        "DISPLAY_PICTURE" => "Y",
        "DISPLAY_PREVIEW_TEXT" => "Y",
        "DISPLAY_TOP_PAGER" => "N",
        "FIELD_CODE" => array(
            0 => "",
            1 => "",
        ),
        "FILTER_NAME" => "",
        "HIDE_LINK_WHEN_NO_DETAIL" => "Y",
        "IBLOCK_ID" => "1",
        "IBLOCK_TYPE" => "news",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
        "INCLUDE_SUBSECTIONS" => "N",
        "MESSAGE_404" => "",
        "NEWS_COUNT" => "10",
        "PAGER_BASE_LINK_ENABLE" => "N",
        "PAGER_DESC_NUMBERING" => "N",
        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
        "PAGER_SHOW_ALL" => "N",
        "PAGER_SHOW_ALWAYS" => "N",
        "PAGER_TEMPLATE" => ".default",
        "PAGER_TITLE" => "Новости",
        "PARENT_SECTION" => "",
        "PARENT_SECTION_CODE" => "",
        "PREVIEW_TRUNCATE_LEN" => "",
        "PROPERTY_CODE" => array(
            0 => "",
            1 => "",
        ),
        "SET_BROWSER_TITLE" => "N",
        "SET_LAST_MODIFIED" => "N",
        "SET_META_DESCRIPTION" => "N",
        "SET_META_KEYWORDS" => "N",
        "SET_STATUS_404" => "N",
        "SET_TITLE" => "N",
        "SHOW_404" => "N",
        "SORT_BY1" => "ACTIVE_FROM",
        "SORT_BY2" => "SORT",
        "SORT_ORDER1" => "DESC",
        "SORT_ORDER2" => "ASC",
        "STRICT_SECTION_CHECK" => "N",
        "COMPONENT_TEMPLATE" => "index.slider"
    ),
    false
);?>

<?php require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>