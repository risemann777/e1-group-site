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
        <button class="btn btn--primary header__button" type="button" data-toggle="modal" data-target="#contactModal">Оставить заявку</button>
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