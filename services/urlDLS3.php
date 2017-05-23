<?php
// DLするURLを生成
$url1 = $client->getObjectUrl('kbtit', 'sample/data1.txt');
print sprintf("<a href='%s'>%s</a>", $url1, $url1);
print "<br />";

// 「5分間だけDLできるURL」を作成する
$url1 = $client->getObjectUrl('kbtit', 'sample/data2.txt', "+5 minutes");
print sprintf("<a href='%s'>%s</a>", $url2, $url2);
