<?php
AddEventHandler("main", "OnEndBufferContent", "deleteKernelCss");

function deleteKernelCss(&$content) {

  global $USER, $APPLICATION;

  if(strpos($APPLICATION->GetCurDir(), "/bitrix/")!==false) return;

  if($APPLICATION->GetProperty("save_kernel") == "Y") return;

  $arPatternsToRemove = Array(

    '/<link.+?href=".+?bitrix\/css\/main\/bootstrap.css[^"]+"[^>]+>/',
    '/<link.+?href=".+?bitrix\/css\/main\/bootstrap.min.css[^"]+"[^>]+>/',
    '/<link.+?href=".+?bitrix\/js\/ui\/bootstrap4\/css\/bootstrap.min.css[^"]+"[^>]+>/',

  );

  $content = preg_replace($arPatternsToRemove, "", $content);

  $content = preg_replace("/\n{2,}/", "\n\n", $content);

}