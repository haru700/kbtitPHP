<?php
require_once('/Users/haru/php/kbtitPHP/pearArchivePkg/Services_Yahoo_JP-0.1.1/Yahoo/JP/MA.php');


// 初期化処理
$yahoo = Services_Yahoo_JP_MA::factory('parse');
$yahoo->withAppID('xxxxxxxxxxx');
$yahoo->setSentence('2014年の登記オリンピックが措置で開幕されました。');

// 形態素解析を実行
$result = $yahoo->submit();

// 結果を取得/解析
$xml = $result->xml->ma_result->word_list->word;

echo "<table>";
  echo "<tr><td>単語</td><td>品詞</td></tr>";
  foreach($xml as $key => $v){
    echo "<tr>";
      echo "<td>" . $v->surface . "</td>";
      echo "<td>" . $v->reading . "</td>";
      echo "<td>" . $v->pos . "</td>";
    echo "</tr>";
  }
echo "</table>";
