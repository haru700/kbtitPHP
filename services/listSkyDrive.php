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

// ファイル一覧を取得する
$id = isset($_GET['id'])  ?  $_GET['id'] : null;
$root = $drive->get_folder($id);
$props = $drive->get_folder_properties($id);

print sprintf("<h2>%s</h2>", $props['name']);

foreach($root as $item){
  if($item['type'] == 'folder'){
    print sprintf("<div>[Folder]<a href='list.php?id=%s'>%s</a></div>", $item['id'], $item['name']);
  }else{
    print sprintf("<div>[File]<a href='file.php?id=%s'>%s</a></div>", $item['id'], $item['name']);
  }
}
