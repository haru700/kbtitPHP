<?php
// 初期設定
require_once('/Users/haru/php/pkg/skydrive/src/functions.inc.php');
session_start();

// ログインページへの遷移
if(!isset($_GET['code'])  ){
  $url = skydrive_auth::build_oauth_url();
  print sprintf("<a href='%s'>Goto OneDrive Oauth</a>", $url);
}else{
  // Callbackから戻ってきたときの処理
  $response = skydrive_auth::get_oauth_token($_GET['code']);

  if($response){
    $token_ser = serialize($response);
    $_SESSION['token'] = $token_ser;
  }
}
