<?php
// 一覧から条件で検索する例
// 一覧から取得する条件を設定

$optParams = [
  'filter' =>  'ebooks',
  'orderBy' => 'newest',
  'maxResults' => 10,
];

// 複数の条件を設定
$volumes = $book->volumes->listVolumes("intitle:ポケットリファレンス subject:Computers", $optParams);
