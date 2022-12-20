<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
  die();
} ?>

<div class="header__bottom">
    <div class="container">
        <nav class="header__nav navigation">
            <ul class="header__menu menu menu_width_full">
              <? foreach ($arResult as $arItem): ?>
                  <li class="menu__item"><a href="<?= $arItem["LINK"] ?>" class="menu__name"><?= $arItem["TEXT"] ?></a>
                      <ul class="dropdown-menu">
                          <li class="dropdown-menu__content">
                              <div class="dropdown-menu__img">
                                  <img src="<?= SITE_TEMPLATE_PATH ?>/assets/images/header-submenu-1.jpg" alt="девочка">
                              </div>
                              <div class="dropdown-menu__menu-col">
                                  <ul class="vertical-menu">
                                    <? foreach ($arItem["SUB_ITEMS"] as $arItemSub): ?>

                                        <li class="vertical-menu__item"><span
                                                    class="vertical-menu__name"><?= $arItemSub["TEXT"] ?></span>
                                            <ul class="vertical-menu__submenu">
                                              <? foreach ($arItemSub["SUB_ITEMS"] as $arItemSubSub): ?>
                                                  <li class="vertical-menu__submenu-item">
                                                      <a href="javascript:void(0);"
                                                         class="link vertical-menu__submenu-name">
                                                        <?= $arItemSubSub["TEXT"] ?>
                                                      </a>
                                                  </li>
                                              <? endforeach; ?>
                                            </ul>
                                        </li>
                                    <? endforeach; ?>
                                  </ul>
                              </div>
                          </li>
                      </ul>
                  </li>
              <? endforeach; ?>
            </ul>
            <button class="burger-btn header__nav-btn js-nav-btn"><span
                        class="burger-btn__switch">Развернуть меню </span>
            </button>
            <div class="navigation__collapse">
                <ul class="navigation__collapse-menu vertical-menu">
                  <? foreach ($arResult as $arItem): ?>
                      <li class="navigation__collapse-item vertical-menu__item">
                          <a href="<?= $arItem["LINK"] ?>" class="vertical-menu__name"><?= $arItem["TEXT"] ?></a>
                      </li>
                  <? endforeach; ?>
                </ul>
            </div>
        </nav>
    </div>
</div>
