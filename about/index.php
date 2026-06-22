<?php
global $APPLICATION;
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("О компании");
$APPLICATION->SetDirProperty("headline_text", "Динамично развивающаяся Группа Компаний, специализирующаяся на производстве и продажах
        решений для строительства, таких как электроинструмент, строительная техника, садовая техника и IT решений для
        управления парком средств малой строительной механизации.");
?>

  <div class="page-about">
    <div class="page-about__section">
      <div class="page-about__container">
        <div class="stat">
          <div class="stat__list">
            <div class="stat__item">
              <div class="stat__label">Лет на рынке</div>
              <div class="stat__info">
                <div class="stat__value">30+</div>
              </div>
            </div>
            <div class="stat__item">
              <div class="stat__label">Число сотрудников</div>
              <div class="stat__info">
                <div class="stat__value">2000+</div>
              </div>
            </div>
            <div class="stat__item">
              <div class="stat__label">Ед. продукции выпускаем в год</div>
              <div class="stat__info">
                <div class="stat__value">>2</div>
                <div class="stat__term">млн.</div>
              </div>
            </div>
            <div class="stat__item">
              <div class="stat__label">Стран присутствия</div>
              <div class="stat__info">
                <div class="stat__value">13</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="page-about__banner">
      <div class="about-banner">
        <div class="about-banner__image">
          <picture>
            <img src="/upload/main/images/about-banner-bg-min.jpg" alt="">
          </picture>
        </div>
        <div class="about-banner__container">
          <div class="about-banner__content">
            <div class="about-banner__title">Группа Компаний «Е1-Групп» это команда профессионалов с опытом работы на
              рынке электроинструментов более 15 лет.
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="page-about__section">
      <div class="page-about__container">
        <div class="page-about__section-heading">
          <div class="page-about__section-title">Наша работа построена на профессионализме и представляет работу во
            множестве сфер
          </div>
        </div>
        <div class="page-about__section-content">
          <div class="sphere">
            <div class="sphere__list">
              <div class="sphere-card sphere__item">
                <div class="sphere-card__icon">
                  <svg class="svg-icon" viewBox="0 0 64 64" width="64" height="64">
                    <use href="#svg-sphere-rocket"></use>
                  </svg>
                </div>
                <div class="sphere-card__title">Маркетинг</div>
                <div class="sphere-card__text"><p>Развитие брендов</p>
                  <p>Поддержка дилерской сети</p>
                  <p>Коммуникация с пользователями напрямую и через лидеров мнений</p></div>
              </div>
              <div class="sphere-card sphere__item">
                <div class="sphere-card__icon">
                  <svg class="svg-icon" viewBox="0 0 64 64" width="64" height="64">
                    <use href="#svg-sphere-boat"></use>
                  </svg>
                </div>
                <div class="sphere-card__title">Логистика и Операции</div>
                <div class="sphere-card__text"><p>Эффективная логистика в партнерстве с Noytech Logistics Rus</p>
                  <p>Цифровизация всех процессов оформления заказов</p></div>
              </div>
              <div class="sphere-card sphere__item sphere-card--black sphere__item--big">
                <div class="sphere-card__decor">
                  <img src="<?= SITE_TEMPLATE_PATH ?>/assets/images/sphere_decor.svg"/>
                </div>
                <div class="sphere-card__icon">
                  <svg class="svg-icon" viewBox="0 0 64 64" width="64" height="64">
                    <use href="#svg-sphere-headset"></use>
                  </svg>
                </div>
                <div class="sphere-card__title">Сервисная поддержка</div>
                <div class="sphere-card__text"><p>Компактная и эффективная сеть сервисных центров</p>
                  <p>Доступ к быстрой сервисной поддержке для всех пользователей через «Сервис-Онлайн)</p>
                  <p>Дополнительные сервисные программы – Полная Гарантия, Подменный фонд и другие.</p></div>
              </div>
              <div class="sphere-card sphere__item">
                <div class="sphere-card__icon">
                  <svg class="svg-icon" viewBox="0 0 64 64" width="64" height="64">
                    <use href="#svg-sphere-memory"></use>
                  </svg>
                </div>
                <div class="sphere-card__title">IT решения</div>
                <div class="sphere-card__text">Программа по управлению парком средств малой строительной механизации
                  на базе RFID меток и программного обеспечения от Softline
                </div>
              </div>
              <div class="sphere-card sphere__item">
                <div class="sphere-card__icon">
                  <svg class="svg-icon" viewBox="0 0 64 64" width="64" height="64">
                    <use href="#svg-sphere-coins"></use>
                  </svg>
                </div>
                <div class="sphere-card__title">Финансовые услуги</div>
                <div class="sphere-card__text">Программа по лизингу парка электроинструментов для крупных конечных
                  пользователей
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="page-about__section">
      <div class="page-about__container">
        <div class="page-about__section-heading">
          <div class="page-about__section-title">Наши ценности — основа нашей деятельности</div>
          <div class="page-about__section-description">Компания Е1-Групп всегда уделяла особое внимание приверженности
            ценностям. Они отражают наши принципы ведения бизнеса: наша профессиональная этика в отношениях с деловыми
            партнерами, инвесторами, сотрудниками и обществом.
          </div>
        </div>
        <div class="page-about__section-content">
          <div class="values">
            <div class="values__list">
              <div class="values__item">
                <div class="values__num"></div>
                <div class="values__info">
                  <div class="values__title">Нацеленность на результат</div>
                  <div class="values__text">Наши действия ориентированы на результат, что гарантирует процветание
                    компании. Это также создает основу для социальных инициатив и работы благотворительного фонда.
                  </div>
                </div>
              </div>
              <div class="values__item">
                <div class="values__num"></div>
                <div class="values__info">
                  <div class="values__title">Инициативность и решительность</div>
                  <div class="values__text">Мы действуем по собственной инициативе, осознавая ответственность за
                    деятельность, и последовательны в достижении целей.
                  </div>
                </div>
              </div>
              <div class="values__item">
                <div class="values__num"></div>
                <div class="values__info">
                  <div class="values__title">Ответственность и устойчивое развитие</div>
                  <div class="values__text">Мы действуем взвешенно и ответственно на благо общества и окружающей
                    среды.
                  </div>
                </div>
              </div>
              <div class="values__item">
                <div class="values__num"></div>
                <div class="values__info">
                  <div class="values__title">Открытость и доверие</div>
                  <div class="values__text">Мы своевременно и открыто информируем о важных событиях в компании. Это
                    основа доверительного сотрудничества.
                  </div>
                </div>
              </div>
              <div class="values__item">
                <div class="values__num"></div>
                <div class="values__info">
                  <div class="values__title">Надежность, доверие и законность</div>
                  <div class="values__text">Мы обещаем только то, что можем выполнить, считаем обещания
                    обязательствами, уважаем и соблюдаем права и законы в осуществлении всех наших бизнес-операций.
                  </div>
                </div>
              </div>
              <div class="values__item">
                <div class="values__num"></div>
                <div class="values__info">
                  <div class="values__title">Честность</div>
                  <div class="values__text">Взаимная честность – условие нашего корпоративного успеха в отношениях
                    друг с другом и с деловыми партнерами.
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="page-about__section">
      <div class="page-about__container">
        <div class="page-about__section-heading">
          <div class="page-about__section-title">Бренды в Группе Компаний «Е1-Групп»</div>
        </div>
        <div class="page-about__section-content">
          <div class="brand brand--three-column">
            <div class="brand__list">
              <div class="brand-card brand__item">
                <div class="brand-card__info">
                  <div class="brand-card__logo"><img src="/upload/main/images/brands/brand_dong_cheng.png"/></div>
                  <div class="brand-card__description"><p>Эксклюзивный дистрибутор бренда DongCheng (DongCheng
                      Professional Power Tools) на Российском рынке.</p></div>
                </div>
                <div class="brand-card__footer"><a class="brand-card__link" href="https:www.dongchengtool.ru">www.dongchengtool.ru</a>
                </div>
              </div>
              <div class="brand-card brand__item">
                <div class="brand-card__info">
                  <div class="brand-card__logo">
                    <img src="/upload/main/images/brands/brand_engels.png" alt=""/>
                  </div>
                  <div class="brand-card__description"><p>Профессиональная линейка инструмента, сделанного в России, с
                      высоким уровнем локализации и повышенным ресурсом на базе бывшего завода Бош в г. Энгельс.</p>
                  </div>
                </div>
                <div class="brand-card__footer">
                  <a class="brand-card__link" href="https:engelstool.ru">engelstool.ru</a>
                </div>
              </div>
              <div class="brand-card brand__item">
                <div class="brand-card__info">
                  <div class="brand-card__logo">
                    <img src="/upload/main/images/brands/brand_dfc.png"/>
                  </div>
                  <div class="brand-card__description"><p>Поставщик строительного оборудования, электроинструментов,
                      садово-парковой техники и сервисных услуг.</p></div>
                </div>
                <div class="brand-card__footer"><a class="brand-card__link" href="https:dctool.ru">dctool.ru</a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="page-about__section">
      <div class="page-about__container">
        <div class="page-about__section-heading">
          <div class="page-about__section-title">Стратегические партнеры</div>
        </div>
        <div class="page-about__section-content">
          <div class="brand brand--two-column">
            <div class="brand__list">
              <div class="brand-card brand__item">
                <div class="brand-card__info">
                  <div class="brand-card__logo">
                    <img src="/upload/main/images/brands/brand_noytech.png" alt=""/>
                  </div>
                  <div class="brand-card__description"><p>Эксклюзивный дистрибутор бренда DongCheng (DongCheng
                      Professional Power Tools) на Российском рынке.</p></div>
                </div>
                <div class="brand-card__footer"><a class="brand-card__link" href="https:www.dongchengtool.ru">www.dongchengtool.ru</a>
                </div>
              </div>
              <div class="brand-card brand__item">
                <div class="brand-card__info">
                  <div class="brand-card__logo">
                    <img src="/upload/main/images/brands/brand_softline.png" alt=""/>
                  </div>
                  <div class="brand-card__description"><p>Профессиональная линейка инструмента, сделанного в России, с
                      высоким уровнем локализации и повышенным ресурсом на базе бывшего завода Бош в г. Энгельс.</p>
                  </div>
                </div>
                <div class="brand-card__footer">
                  <a class="brand-card__link" href="https:engelstool.ru">engelstool.ru</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="page-about__section-bottom">
          <div class="cta-panel">
            <div class="cta-panel__decor"><img src="<?=SITE_TEMPLATE_PATH?>/assets/images/cta_panel_decor.svg"></div>
            <div class="cta-panel__info">
              <div class="cta-panel__title">Хотите стать нашим партнером?</div>
              <div class="cta-panel__text">Мы открыты для новых идей и совместных проектов — свяжитесь с нами!</div>
            </div>
            <div class="cta-panel__button">
              <button class="btn btn--secondary" type="button" data-toggle="modal" data-target="#contactModal">
                Обсудить сотрудничество
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <section class="career" id="career">
      <div class="career__container">
        <div class="career__col">
          <div class="career__title">Стройте карьеру с нами</div>
          <div class="career__description"><p>Команда «Е1-Групп» — сплоченный коллектив с международной экспертизой в
              области продукта, продаж, маркетинга, процессов, технической и сервисной поддержки продукта. Приглашаем
              стать его частью!</p>
            <p>Чтобы ознакомиться с текущими вакансиями, пожалуйста перейдите в профиль компании на HeadHunter. Там вы
              найдете подробную информацию о доступных возможностях! Будем рады видеть Вас в нашем офисе!</p></div>
          <div class="career__controls"><a class="btn btn--primary" href="https://hh.ru">Смотреть вакансии на HH</a>
          </div>
        </div>
        <div class="career__col">
          <div class="career__video">
            <video autoplay loop muted>
              <source src="/upload/main/media/hr_video_looped.mp4" type="video/mp4">
            </video>
          </div>
        </div>
      </div>
    </section>
  </div>

<?php require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>