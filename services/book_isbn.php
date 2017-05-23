<?php
// ライブラリの読み込み
require_once('/Users/haru/php/kbtitPHP/src/Google/Client.php');
require_once('/Users/haru/php/kbtitPHP/src/google-api-php-client-services/src/Google/Service/Books.php');
session_start();
print "foo";

// APIに接続するための初期設置
$apiConfig['use_objects'] = true;
$client = new Google_Client();
$client->setApplicationName("PHP Mook");
// DIで利用するサービスのインスタンスを作成
$book = new Google_Service_Books($client);

// ISBNを指定して書籍情報を検索
$volumes = $book->volumes->getTotalItems();

// ストクした書籍情報の表示
$num = $volumes->getTotalItems();
if($num > 0){
  $items = $volumes->getItems();
  $book = $items[0];
  print("<div class='book'>");
    $info = $book->volumInfo;
    $url = $book->volumInfo->imageLinks->thubnail;
    print sprintf("<h1><img src='%s' stylse='float: left'>", $info->imageLinks->smallThubnail);
    print sprintf("<span>%s</span></h1>", htmlspecialchars($info->title)  );
    print sprintf("<div style='clear:both'>%s</div>", htmlspecialchars($imfo->description) );
    print sprintf("<p>全%sページ</p>", htmlspecialchars($info->pageCount)  );
    print sprintf("<img src='%s'><br /><br />", $url);
  print("</div>");
}
