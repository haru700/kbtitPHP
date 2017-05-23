<?php
// 必要なライブラリ読み込み
ini_set('include_path', ini_get('include_path').PATH_SEPARATORPATH_SEPARATOR."./google-api-php-client/src");
require_once ('../src/Google/Client.php');
session_start();

// APIキーの設定と初期化
$client = new Google_Client();
$client->setApplicationName("PHP Mook");
$client->setClientId("317125129650-avtb7g0j906dtb28qsne4sdelplnevus.apps.googleusercontent.com");
$client->setClientSecret("");
$client->setRedirectUri("");
$client->setDeveloperKey("AIzaSyBY3pgqQMrYdKI5c_Vyou9zP_mVhgV_qs0");

// 実際に使用するサービスのスコープ(権限範囲)を設定する
require_once ('Google/Sercice/Calender.php');
$client->appScope(Google_service_Calendar::CLENDAR);

if(!isset($_SESSION['ACCESS_TOKEN']) ){
  // 「認証URL」に遷移するためのURLを作成
  if(!isset($_GET['code']) ){
    $authUrl = $clent->createAuthUrl();
    $_SESSION['ACCESS_TOKEN'] = $client->getAccessToken();
    print "<div>認証しました</div>";
  }
}

if(isset($_SESSION['ACCESS_TOKEN']) ){
  // 「アクセストークンがある」場合には実際のサービスを利用する処理をする
  print("<a href='service.php'>サービス利用へ進む</a>");
}
