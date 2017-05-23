<?php
// 「短縮URL」から->
//
// クリック数」などの情報を取得
require_once('/Users/haru/php/pkg/bitly/bitly.php');

// 短縮URLを元に戻す
$results = bitly_v3_expand([
  'http://bit.ly',
  'http://',
]);

foreach($results as $item){
  // もともとのURLを取得
  echo $item['long_url'] . "¥n";

  // クリック数を取得する
  $clicks = bitly_v3_clicks($item['hash']);
  var_dump($clicks);
}
