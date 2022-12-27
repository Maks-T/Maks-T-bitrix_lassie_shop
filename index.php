<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Популярные товары");
global $trendFilter;
$trendFilter = array('PROPERTY_TREND' => '4');
?>

<? $APPLICATION->IncludeComponent(
  "bitrix:sale.bestsellers",
  "lassie",
  array(
    "ACTION_VARIABLE" => "basket_action",
    "ADDITIONAL_PICT_PROP_2" => "MORE_PHOTO",
    "ADD_PROPERTIES_TO_BASKET" => "Y",
    "AJAX_MODE" => "N",
    "AJAX_OPTION_ADDITIONAL" => "",
    "AJAX_OPTION_HISTORY" => "N",
    "AJAX_OPTION_JUMP" => "N",
    "AJAX_OPTION_STYLE" => "Y",
    "BASKET_URL" => "/personal/cart/",
    "BY" => "QUANTITY",
    "CACHE_TIME" => "86400",
    "CACHE_TYPE" => "A",
    "CART_PROPERTIES_2" => array(
      0 => "",
      1 => "",
    ),
    "COMPONENT_TEMPLATE" => "lassie",
    "CONVERT_CURRENCY" => "Y",
    "CURRENCY_ID" => "RUB",
    "DETAIL_URL" => "",
    "FILTER" => array(
      0 => "CANCELED",
      1 => "ALLOW_DELIVERY",
      2 => "PAYED",
      3 => "DEDUCTED",
      4 => "N",
      5 => "P",
      6 => "F",
    ),
    "HIDE_NOT_AVAILABLE" => "N",
    "LABEL_PROP_2" => "SALELEADER",
    "LINE_ELEMENT_COUNT" => "5",
    "MESS_BTN_BUY" => "Добавить в корзину",
    "MESS_BTN_DETAIL" => "Подробнее",
    "MESS_BTN_SUBSCRIBE" => "Подписаться",
    "MESS_NOT_AVAILABLE" => "Нет в наличии",
    "PAGE_ELEMENT_COUNT" => "10",
    "PARTIAL_PRODUCT_PROPERTIES" => "Y",
    "PERIOD" => "180",
    "PRICE_CODE" => array(
      0 => "BASE",
    ),
    "PRICE_VAT_INCLUDE" => "Y",
    "PRODUCT_ID_VARIABLE" => "id",
    "PRODUCT_PROPS_VARIABLE" => "PROPS",
    "PRODUCT_QUANTITY_VARIABLE" => "QUANTITY",
    "PRODUCT_SUBSCRIPTION" => "Y",
    "PROPERTY_CODE_2" => array(
      0 => "",
      1 => "",
    ),
    "SHOW_DISCOUNT_PERCENT" => "Y",
    "SHOW_IMAGE" => "Y",
    "SHOW_NAME" => "Y",
    "SHOW_OLD_PRICE" => "Y",
    "SHOW_PRICE_COUNT" => "1",
    "SHOW_PRODUCTS_2" => "Y",
    "TEMPLATE_THEME" => "",
    "USE_PRODUCT_QUANTITY" => "Y",
    "SHOW_PRODUCTS_3" => "Y",
    "PROPERTY_CODE_3" => array(
      0 => "SIZES_SHOES",
      1 => "SIZES_CLOTHES",
      2 => "",
    ),
    "CART_PROPERTIES_3" => array(
      0 => "SIZES_SHOES",
      1 => "SIZES_CLOTHES",
      2 => "",
    ),
    "ADDITIONAL_PICT_PROP_3" => "MORE_PHOTO",
    "LABEL_PROP_3" => "NEW_SALE_HIT",
    "PROPERTY_CODE_5" => array(
      0 => "",
      1 => "",
    ),
    "CART_PROPERTIES_5" => array(
      0 => "SIZES_CLOTHES",
      1 => "",
    ),
    "ADDITIONAL_PICT_PROP_5" => "MORE_PHOTO",
    "OFFER_TREE_PROPS_5" => array(
      0 => "SIZES_CLOTHES",
    ),
    "PROPERTY_CODE_4" => array(
      0 => "SIZES",
      1 => "",
    ),
    "CART_PROPERTIES_4" => array(
      0 => "SIZES",
      1 => "",
    ),
    "ADDITIONAL_PICT_PROP_4" => "",
    "OFFER_TREE_PROPS_4" => array(
      0 => "SIZES",
    ),
    "OFFER_TREE_PROPS_3" => array(
      0 => "SIZES_SHOES",
      1 => "SIZES_CLOTHES",
    )
  ),
  false
); ?>
    </div>
    </section><? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>