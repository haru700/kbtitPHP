<?php


namespace Foo{
// 初期設定
require_once('/Users/haru/php/kbtitPHP/vendor/autoload.php');
require_once('/Users/haru/php/kbtitPHP/vendor/aws/aws-sdk-php/src/Aws/S3/S3Client.php');
require_once('/Users/haru/php/kbtitPHP/vendor/aws/aws-sdk-php/src/Aws/Common/Client/AbstractClient.php');
use Aws¥S3¥S3Client;

// キーを設定して「クライアントクラス」を生成
$client = Aws¥S3¥S3Client::factory([
  "key" => "AKIAI7PR25TZBW6OGGWQ",
  "seclet" => 'XaQOyI2SXooxUN/AYkUPmIxNfCcpFswX613uLZ+4',
]);

// bucketを作成する
$bucket = [
  'Bucket' =>  'kbtit',
];

$client->createBucket($bucket);

// bucketを削除する
$client->deleteBucket($bucket);

}
