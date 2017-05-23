<?php
require_once ('/Users/haru/php/pkg/eden/eden.php');
require_once ('/Users/haru/php/pkg/eden/eden.php');


// 初期化処理
eden()->setLoader();

// 「認証URL」へ転送
$auth = eden('facebook')->auth($config['key'], $config['pass'], $config['callback_url']);
$loginUrl = $auth->getLoginUrl();

header('Location: ' . $loginUrl);
