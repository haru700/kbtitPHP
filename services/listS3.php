<?php
use aws¥s3¥S3Client;

$config = [
  'key' =>  'AKIAI7PR25TZBW6OGGWQ',
  'secret' => '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',
];

$client = S3Client::factory($config);
$bucket = 'kbtit';

// 全ての「オブジェクト」を取得する
print "<h2>全てのオブジェクト一覧</h2>";
print "<ul>";
  $param = [
    'Bucket' =>  $bucket,
    'Prefix' =>  'sample/',
    'Delimitor' =>  '/',
  ];

  $iterator = $client->getListObjectsIterator($param);

  foreach($iterator as $item){
    print sprintf("<li><a href='get.php?key=%s'>%s</a></li>", urlencode($item['key']), $item['key']);
  }
print"</ul>";
