<?php

require_once('/Users/haru/php/kbtitPHP/vendor/autoload.php');
use Bullet¥App;

// Bulletオブジェクトの生成


var_dump('=================='); var_dump('require');
var_dump(require_once('/Users/haru/php/repeat/vendor/vlucas/bulletphp/src/Bullet/App.php')); var_dump('==================');
// Bulletオブジェクトの生成
$app = new App();

// イベントの定義
$app->('/hello', function($request) use($app){
  $app->param('int', function($request, $postId) (use $app){
    return "int " . $postId;
  });
  $app->param('slug', function($request, $postId) (use $app){
    return "slug " . $postId;
  });
});

// ルーティングの実行
echo $app->run(new Bullet¥Request() );
