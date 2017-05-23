<?php

// ZendGData¥HttpClientオブジェクトを生成
$client = new Zend_Gdata¥HttpClient();
$client->setAdapter('Zend¥Http¥Client¥Adapter¥Socket');
var_dump($client);
$client->getAdapter();
