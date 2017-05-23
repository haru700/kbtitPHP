<?php
require_once('/Users/haru/php/kbtitPHP/src/googleMaps/releases/3.0/src/GoogleMap.php');
require_once('/Users/haru/php/kbtitPHP/src/googleMaps/releases/3.0/src/JSMin.php');
var_dump('=================='); var_dump(''); var_dump(); var_dump('==================');
var_dump('==================');
get_declared_classes();
// インスタンス生成
$gmap = new GoogleMapAPI();
// スマホ対応
$gmap->mobile = true;

// 地図の種類を指定
$gmap->setMapType('map');

// マーカーを追加(表示する地点, 地図のタイトル, 吹き出しで表示する文字)
$gmap->addMarkerByAddress("井の頭公園", "井之頭公園周辺マップ", "井之頭公園の入口");

// ズームの指定
$gmap->setZoomLevel(17);
?>

<html>
  <head>
    <meta charset="utf-8">
    <!-- // Google Maps APIのJavaScriptを出力 -->
    <?php echo $gmap->getHeaderJS(); ?>
    <?php echo $gmap->getMapJS(); ?>
  </head>
  <body>
    <!-- // Google Maps サイドバーそ出力 -->
    <?php echo $gmap->printOnLoad(); ?>
    <?php echo $gmap->printMap(); ?>
    <?php echo $gmap->printSidebar(); ?>
  </body>
</html>
