<?php
// 初期設定
require_once('/Users/haru/php/kbtitPHP/pearArchivePkg/Services_Amazon-0.9.0/Services/Amazon.php');

$amazon = new Services_Amazon($config['key'], $config['secret'], $config['track_id']);
$amazon->setLcale('JP');

// 商品情報取得
$options = [
  'ResponceGroup' =>  'ItemAttributes,Images',
];
$id = isset($_GET['id'])? $_GET['id'] : '4774156116';
$result = $amazon->ItemLookup($id, $options);

// 見つかった商品を表示
if(! PEAR::isError($result)  ){
  $item = $result['Item'][0];
  print sprintf("<h4>%s</h4>", htmlspecialchars($item['ItemAttributes']['Title']  );
  print sprintf("<a href='%s'>詳細へ</a><br />", $item['DetailPageURL']); htmlspecialchars($item['ItemAttributes']['Title']  );
  print sprintf("<img src='%s' style='float: left'>", $['MediumImage']['URL']);
  
  print("<div style='float: left; padding-left: 1em;'>");
    foreach($item['itemLinks'] as $links){
      foreach($link as $link){
        print sprintf("<a href='%s'>%s</a><br />", $link['URL'], $link['Description']);
      }
    }
  print("</div>");
}
