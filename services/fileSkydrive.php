<?php
// 初期設定
require_once('/Users/haru/php/pkg/skydrive/src/functions.inc.php');
session_start();

// 「セッション」から「アクセストークン」を取得
$token = $_SESSION['token'];
if(!$token){
  header('Location: index.php');
}

$token = unserialize($token);
$drive = new skydrive($token['access_token']);

$id = isset($_GET['id'])  ?  $_GET['id'] : null;
$props = $drive->get_folder_properties($id);

$ret = $drive->download($id);
if($ret){
  foreach($ret as $file){
    $props = $file['properties'];
    print sprintf("<h3>%s</h3>", $props['name']);
    print sprintf("<a href='%s'>download</a>", $props['source']);
  }
}
