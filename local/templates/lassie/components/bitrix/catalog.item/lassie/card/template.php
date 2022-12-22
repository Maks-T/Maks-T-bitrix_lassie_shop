<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
  die();
}

use \Bitrix\Main\Localization\Loc;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $item
 * @var array $actualItem
 * @var array $minOffer
 * @var array $itemIds
 * @var array $price
 * @var array $measureRatio
 * @var bool $haveOffers
 * @var bool $showSubscribe
 * @var array $morePhoto
 * @var bool $showSlider
 * @var bool $itemHasDetailUrl
 * @var string $imgTitle
 * @var string $productTitle
 * @var string $buttonSizeClass
 * @var string $discountPositionClass
 * @var string $labelPositionClass
 * @var CatalogSectionComponent $component
 */

/*echo '<pre>';
print_r($arParams);
echo '</pre>';*/
?>


<article class="good">
    <div class="good__content">
        <a href="javascript:void(0);" class="good__link">
            <img src="<?= $morePhoto[0]['SRC']; ?>" alt="Товар" class="good__img" title="">
        </a><a href="javascript:void(0);" class="like">Мне нравится</a>
      <? if ($itemHasDetailUrl): ?>
        <h4 " title="<?= $productTitle ?>" class="good__name">
          <? endif; ?>
          <?= $productTitle ?>
          <? if ($itemHasDetailUrl): ?>
       </h4>
    <? endif; ?>
        <div class="good__price-wrapper"><span class="good__price" id="<?= $itemIds['PRICE'] ?>">
							<?
                            if (!empty($price)) {
                              if ($arParams['PRODUCT_DISPLAY_MODE'] === 'N' && $haveOffers) {
                                echo Loc::getMessage(
                                  'CT_BCI_TPL_MESS_PRICE_SIMPLE_MODE',
                                  array(
                                    '#PRICE#' => $price['PRINT_RATIO_PRICE'],
                                    '#VALUE#' => $measureRatio,
                                    '#UNIT#' => $minOffer['ITEM_MEASURE']['TITLE']
                                  )
                                );
                              } else {
                                echo $price['PRINT_RATIO_PRICE'];
                              }
                            }
                            ?>
						</span>
        </div>
    </div>
    <div class="good__hover">
        <form method="post" class="form good__order" id="form_<?= $item['ID']; ?>">
            <div class="good__order-row">
                <label class="good__order-label">Выберите размер</label>

              <? foreach ($arParams['SKU_PROPS'] as $skuProperty) :
                $propertyId = $skuProperty['ID'];
                $skuProperty['NAME'] = htmlspecialcharsbx($skuProperty['NAME']);
                if (!isset($item['SKU_TREE_VALUES'][$propertyId]))
                  continue;
                if ($skuProperty["CODE"] === "COLOR_REF") continue;
                foreach ($skuProperty['VALUES'] as $value) : ?>
                  <? if($value["NAME"] === '-') continue ?>
                    <div class="checkbox-tile">
                        <input
                          <?= !isset($item['SKU_TREE_VALUES'][$propertyId][$value['ID']]) ? "disabled" : ''?>
                                name="Good[size]"
                                id="<?= $item['ID'] ?>-<?= $value['ID'] ?>"
                                type="radio"
                                value="<?= $value["NAME"] ?>"
                                required
                                class="checkbox-tile__elem">
                        <label data-treevalue="<?= $propertyId ?>-<?= $value['ID'] ?>"
                               data-onevalue="<?= $value['ID'] ?>"
                               for="<?= $item['ID'] ?>-<?= $value['ID'] ?>"
                               class="checkbox-tile__label"><?= $value["NAME"] ?></label>
                    </div>
                <? endforeach ?>
              <? endforeach ?>

            </div>
            <div class="good__order-row" data-entity="quantity-block">
                <label for="<?= $itemIds['QUANTITY']; ?>" class="good__order-label">Количество</label>

                <div class="input-number" >
                    <input id="<?= $itemIds['QUANTITY']; ?>" name="Good[number]" type="number" step="1" min="1" required
                           class="input-number__elem">
                    <div class="input-number__counter"><span
                                class="input-number__counter-spin input-number__counter-spin_more" id="<?= $itemIds['QUANTITY_UP'] ?>">Больше</span><span
                                class="input-number__counter-spin input-number__counter-spin_less" id="<?= $itemIds['QUANTITY_DOWN'] ?>">Меньше</span>
                    </div>
                </div>
            </div>
            <div id="<?= $itemIds['BASKET_ACTIONS'] ?>">
                <button id="<?= $itemIds["BUY_LINK"] ?>" type="submit" class="btn">Добавить в корзину</button>
            </div>
        </form>
    </div>
</article>

<script>

    $('#form_<?= $item['ID']; ?>' ).on('submit', function(e) {
            e.preventDefault();
        $.post('/catalog/?action=ADD2BASKET&ajax_basket=Y&id=<?=$item["ID"];?>&quantity=1',
            function (data) {
            console.log(<?= $item["ID"] ?>);
              /*  data = data.split('\'').join('\u0022');
                const obj = JSON && JSON.parse(data) || $.parseJSON(data);
                if (obj.STATUS == 'OK') {
                    BX.onCustomEvent('OnBasketChange');
                }*/
            });
    });



/*$(document).ready(function() {
        $("#<?= $itemIds['BASKET_ACTIONS'] ?>").each(function(i){
            $(this).click(function() {
                this.blur();
                var link = $(this).attr('href').match(/\?.*$/);
                console.log(link);
                $.ajax({
                    type: 'GET',
                    url: '/add2basket.php'+link.valueOf(),
                    success: function(data){
                       console.log("<?= $itemIds['BASKET_ACTIONS'] ?>");
                    }
                });
                return false;
            });
        });
    });*/
</script>