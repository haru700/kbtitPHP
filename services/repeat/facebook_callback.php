<?php
require_once ('eden.php');
require_once ('config.php');

// セッションを介し
session_start();

eden()->setLoader();
$auth = eden('facebook')->auth($config['key'], $config['pass'], $config['callback_url']);

// アクセストークン
$access = $auth->getAccess($_GET['code']);

// ユーザー情報を取得
$user = eden('facebook')->graph($access['access_token'])->getUser();
echo "ようこそ、" . $user['name'] . "さん";
