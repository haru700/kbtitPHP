<?php
// 必要なライブラリ読み込み
require_once('/Users/haru/php/kbtitPHP/src/Google/Client.php');
require_once('/Users/haru/php/kbtitphp/src/google-api-php-client-services/src/google/service/drive.php');



$apiConfig['user_objects'] = true;
$client = new Google_Client();

// APIキーの設定
$client->setClientId("317125129650-220q83jq4ekr1sspieosrerg3e01o171.apps.googleusercontent.com");
$client->setClientSecret("kWu6dJQRJtsLWUBlxak290kG");
$client->setRedirectUri("http://foo.com/oauth2callback");
$client->setDeveloperKey("AIzaSyBY3pgqQMrYdKI5c_Vyou9zP_mVhgV_qs0");

// アクセストークンの設定
$client->setAccessToken('ya29.GltKBIfQ6s5tt-LGrGdH-skJOGPrw13SB-DiKJDrvXEv04wp9tcmoqpC8pHTSqhloX5lw1N6HWSPTPWiUVsgaA7OLU48aB05gw4CJq8YHQdROeGs6z2dHkpMAQvB');

$drive = new Google_Sevice_Drive($client);

// ファイル一覧を取得
$list_opt = [
  // 最大で10件取得
  'maxResults' =>  10,
];

// Google_Service_Drive_FileList
$files = $drive->files;
$list = $files->listFiles($list_opt);

// 取得した一覧
$items = $list->getItems();
foreach($items as $file){
  $file_id = $file->getId();
  print sprintf("<a href='file.php?file_id=%s'>%s</a>", $file_id, $file->getTitle() );
  print sprintf("<form method='POST' action='delete.php'><input type='hidden' name='file_id' value='%s'><input type='submit' value='delete'></form>", $file_id);
  print "<br />";
  print $file->getMimeType();
  print "<br />";
}
