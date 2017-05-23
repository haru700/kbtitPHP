<?php
require_once('/Users/haru/php/pear/Services_TinyURL-0.1.2/Services/TinyURL.php');

// インスタンス生成
$tiny = new Services_TinyURL();
// URLを短縮
$url = $tiny->create('http://www.amazon.co.jp/dp/4774162965/');

echo $url; // 結果 http:tinyurl.com/ll4duyz
