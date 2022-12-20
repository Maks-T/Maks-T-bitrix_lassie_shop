<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use Bitrix\Main\Page\Asset;

$asset = Asset::getInstance();

$asset->addCss(SITE_TEMPLATE_PATH . '/assets/styles/app.min.css');
$asset->addJs(SITE_TEMPLATE_PATH . '/assets/scripts/app.min.js');

//----------------------------------

IncludeTemplateLangFile($_SERVER["DOCUMENT_ROOT"]."/bitrix/templates/".SITE_TEMPLATE_ID."/header.php");
CJSCore::Init(array("fx"));

\Bitrix\Main\UI\Extension::load("ui.bootstrap4");

if (isset($_GET["theme"]) && in_array($_GET["theme"], array("blue", "green", "yellow", "red")))
{
	COption::SetOptionString("main", "wizard_eshop_bootstrap_theme_id", $_GET["theme"], false, SITE_ID);
}
$theme = COption::GetOptionString("main", "wizard_eshop_bootstrap_theme_id", "green", SITE_ID);

$curPage = $APPLICATION->GetCurPage(true);


?>
<!DOCTYPE html>
<html xml:lang="<?=LANGUAGE_ID?>" lang="<?=LANGUAGE_ID?>">
<head>
	<title><?$APPLICATION->ShowTitle()?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, width=device-width">
	<link rel="shortcut icon" type="image/x-icon" href="<?=SITE_DIR?>favicon.ico" />
	<? $APPLICATION->ShowHead(); ?>
</head>
<body class="bx-background-image bx-theme-<?=$theme?>" <?$APPLICATION->ShowProperty("backgroundImage");?>>
<div id="panel"><? $APPLICATION->ShowPanel(); ?></div>
<?$APPLICATION->IncludeComponent(
	"bitrix:eshop.banner",
	"",
	array()
);?>
<header class="header">
    <div class="header__top">
        <div class="container header__container header__container_top">
            <div class="header__col header__col_top-left"><span class="header__icon icon-mail"></span><a href="javascript:void(0);" class="link">Подписаться</a>
            </div>
            <div class="header__col header__col_top-right">
                <ul class="header__top-menu menu">
                    <li class="menu__item"><a href="javascript:void(0);" class="link menu__name">О компании</a>
                    </li>
                    <li class="menu__item"><a href="javascript:void(0);" class="link menu__name">Оплата</a>
                    </li>
                    <li class="menu__item"><a href="javascript:void(0);" class="link menu__name">Доставка</a>
                    </li>
                </ul>
              <?$APPLICATION->IncludeComponent(
	"bitrix:search.title",
	".default",
	array(
		"NUM_CATEGORIES" => "1",
		"TOP_COUNT" => "5",
		"CHECK_DATES" => "N",
		"SHOW_OTHERS" => "N",
		"PAGE" => SITE_DIR."catalog/",
		"CATEGORY_0_TITLE" => GetMessage("SEARCH_GOODS"),
		"CATEGORY_0" => array(
			0 => "iblock_catalog",
		),
		"CATEGORY_0_iblock_catalog" => array(
			0 => "all",
		),
		"CATEGORY_OTHERS_TITLE" => GetMessage("SEARCH_OTHER"),
		"SHOW_INPUT" => "Y",
		"INPUT_ID" => "title-search-input",
		"CONTAINER_ID" => "search",
		"PRICE_CODE" => array(
			0 => "BASE",
		),
		"SHOW_PREVIEW" => "Y",
		"PREVIEW_WIDTH" => "75",
		"PREVIEW_HEIGHT" => "75",
		"CONVERT_CURRENCY" => "Y",
		"COMPONENT_TEMPLATE" => ".default",
		"ORDER" => "date",
		"USE_LANGUAGE_GUESS" => "Y",
		"TEMPLATE_THEME" => "blue",
		"PRICE_VAT_INCLUDE" => "Y",
		"PREVIEW_TRUNCATE_LEN" => "",
		"CURRENCY_ID" => "RUB"
	),
	false
);?>
            </div>
        </div>
    </div>
    <div class="header__middle">
        <div class="container header__container header__container_middle">
            <div class="header__col header__col_logo">
                <a href="javascript:void(0);" class="header__logo logo">
                    <img src="<?= SITE_TEMPLATE_PATH ?>/assets/images/logo.png" class="logo__img" alt="">
                </a>
            </div>
            <div class="header__contacts"><span class="header__icon icon-comment"></span>
                <div class="header__col header__col_contacts">
                    <div class="contacts"><a href="" class="contacts__tel"> <?$APPLICATION->IncludeComponent(
                          "bitrix:main.include",
                          "",
                          array(
                            "AREA_FILE_SHOW" => "file",
                            "PATH" => SITE_DIR."include/telephone1.php"
                          ),
                          false
                        );?></a>
                        <div class="contacts__info"><?$APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            array(
                              "AREA_FILE_SHOW" => "file",
                              "PATH" => SITE_DIR."include/schedule1.php"
                            ),
                            false
                          );?></div>
                    </div>
                </div>
                <div class="header__col header__col_contacts">
                    <div class="contacts"><a href="" class="contacts__tel">
                        <?$APPLICATION->IncludeComponent(
                          "bitrix:main.include",
                          "",
                          array(
                            "AREA_FILE_SHOW" => "file",
                            "PATH" => SITE_DIR."include/telephone2.php"
                          ),
                          false
                        );?></a>
                        <div class="contacts__info"><?$APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            array(
                              "AREA_FILE_SHOW" => "file",
                              "PATH" => SITE_DIR."include/schedule2.php"
                            ),
                            false
                          );?></div>
                    </div>
                </div>
                <div class="header__col header__col_contacts"><a href="javascript:void(0);" class="link">Контактная информация</a>
                </div>
            </div>
            <div class="header__col header__col_basket"><span class="header__icon icon-bag"></span>
              <?$APPLICATION->IncludeComponent(
	"bitrix:sale.basket.basket.line", 
	".default", 
	array(
		"PATH_TO_BASKET" => SITE_DIR."personal/cart/",
		"PATH_TO_PERSONAL" => SITE_DIR."personal/",
		"SHOW_PERSONAL_LINK" => "N",
		"SHOW_NUM_PRODUCTS" => "Y",
		"SHOW_TOTAL_PRICE" => "Y",
		"SHOW_PRODUCTS" => "N",
		"POSITION_FIXED" => "N",
		"SHOW_AUTHOR" => "Y",
		"PATH_TO_REGISTER" => SITE_DIR."login/",
		"PATH_TO_PROFILE" => SITE_DIR."personal/",
		"COMPONENT_TEMPLATE" => ".default",
		"PATH_TO_ORDER" => SITE_DIR."personal/order/make/",
		"SHOW_EMPTY_VALUES" => "Y",
		"PATH_TO_AUTHORIZE" => "",
		"SHOW_REGISTRATION" => "Y",
		"HIDE_ON_BASKET_PAGES" => "Y"
	),
	false
);?>
            </div>

        </div>
    </div>
    <div class="header__bottom">
        <div class="container">
          <?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"menu_header_bottom", 
	array(
		"ROOT_MENU_TYPE" => "left",
		"MENU_CACHE_TYPE" => "A",
		"MENU_CACHE_TIME" => "36000000",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"MENU_THEME" => "site",
		"CACHE_SELECTED_ITEMS" => "N",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MAX_LEVEL" => "3",
		"CHILD_MENU_TYPE" => "left",
		"USE_EXT" => "Y",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N",
		"COMPONENT_TEMPLATE" => "menu_header_bottom"
	),
	false
);?>
        </div>
    </div>
  <?$APPLICATION->IncludeComponent(
    "bitrix:news.list",
    ".default",
    array(
      "ACTIVE_DATE_FORMAT" => "d.m.Y",
      "ADD_SECTIONS_CHAIN" => "Y",
      "AJAX_MODE" => "N",
      "AJAX_OPTION_ADDITIONAL" => "",
      "AJAX_OPTION_HISTORY" => "N",
      "AJAX_OPTION_JUMP" => "N",
      "AJAX_OPTION_STYLE" => "Y",
      "CACHE_FILTER" => "N",
      "CACHE_GROUPS" => "Y",
      "CACHE_TIME" => "36000000",
      "CACHE_TYPE" => "A",
      "CHECK_DATES" => "Y",
      "COMPONENT_TEMPLATE" => ".default",
      "DETAIL_URL" => "",
      "DISPLAY_BOTTOM_PAGER" => "Y",
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
      "HIDE_LINK_WHEN_NO_DETAIL" => "N",
      "IBLOCK_ID" => "1",
      "IBLOCK_TYPE" => "news",
      "INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
      "INCLUDE_SUBSECTIONS" => "Y",
      "MESSAGE_404" => "",
      "NEWS_COUNT" => "20",
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
      "SET_BROWSER_TITLE" => "Y",
      "SET_LAST_MODIFIED" => "N",
      "SET_META_DESCRIPTION" => "Y",
      "SET_META_KEYWORDS" => "Y",
      "SET_STATUS_404" => "N",
      "SET_TITLE" => "Y",
      "SHOW_404" => "N",
      "SORT_BY1" => "ACTIVE_FROM",
      "SORT_BY2" => "SORT",
      "SORT_ORDER1" => "DESC",
      "SORT_ORDER2" => "ASC",
      "STRICT_SECTION_CHECK" => "N"
    ),
    false
  );?>
</header>
<div class="bx-wrapper" id="bx_eshop_wrap">


