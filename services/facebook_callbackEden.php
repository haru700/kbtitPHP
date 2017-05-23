<?php
require_once ('/Users/haru/php/pkg/eden/eden.php');
require_once ('/Users/haru/php/pkg/eden/config/config.php');

// セッションを開始
session_start();

eden()->setLoader();
$auth = eden('google')->auth($config['key'], $config['pass'], $config['callback_url']);

// 「アクセストークン」の取得
$access = $auth->getAccess('4/HObnL2S0RnrSdKjyJlqpiJSkXra7hN6EqKqWTr3JYUQ#');

// ユーザ情報の取得
$user = eden('google')->graph($access['access_token'])->getUser();
echo "ようこそ" . $user['name'] . "さん";
