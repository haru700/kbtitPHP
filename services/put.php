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

// 「フォルダの作成」と「ファイルの登録」
// 「フォルダID」の取得(nullの場合にはルート)
$folder_id = $drive->get_folder_properties(null);
// フォルダの作成
$folder_id2 = $drive->create_folder($folder_id['id'], "upload");
// ファイルのアップロード
$drive->put_file($folder_id2[0]['id'], "data/data1.txt");
