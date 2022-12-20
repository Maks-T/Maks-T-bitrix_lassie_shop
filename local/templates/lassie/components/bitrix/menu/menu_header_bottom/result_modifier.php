<?php

if (!empty($arResult)) {
  $parentID = false;
  $subParentID = false;
  foreach($arResult as $i => $arItem) {
    if ($arItem['DEPTH_LEVEL'] == 1) {
      $parentID = $i;
      $arResult[$i]['SUB_ITEMS'] = array();
    } elseif ($arItem['DEPTH_LEVEL']==2 && $parentID!==false) {
      $arResult[$parentID]['SUB_ITEMS'][$i] = $arItem;
      $subParentID = $i;
      unset($arResult[$i]);
    } elseif ($arItem['DEPTH_LEVEL']==3 && isset($arResult[$parentID]['SUB_ITEMS'][$subParentID])) {
      if (!isset($arResult[$parentID]['SUB_ITEMS'][$subParentID]['SUB_ITEMS'])) {
        $arResult[$parentID]['SUB_ITEMS'][$subParentID]['SUB_ITEMS'] = array();
      }
      $arResult[$parentID]['SUB_ITEMS'][$subParentID]['SUB_ITEMS'][] = $arItem;
      unset($arResult[$i]);
    }
  }
  $arResult = array_values($arResult);
}
