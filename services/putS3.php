<?php
// オブジェクトの保存
// 文字列からの保存

$result = $client->putObject([
  'Bucket' => 'kbtit',
  'Key' => 'foldar/foo.txt',
  'Body' => 'Hello!',
  // 'Body' => fopen('data/test.text'), のように「リソース指定」も可能
]);

// データのメタ情報

$size = $ret['ContentLength']; // => "20"
$type = $ret['ContentType']; // => "text/plain"
$mtime = $ret['LastModified']; // => "Sat, 01 Mar 2014 07:45:45 GMT"
