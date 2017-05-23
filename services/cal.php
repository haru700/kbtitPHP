<?php
// ライブラリの読み込み
require_once('/Users/haru/php/kbtitPHP/src/Google/Client.php');
ini_set('memory_limit', '1000M');
require_once('/Users/haru/php/kbtitPHP/src/google-api-php-client-services/src/Google/Service/Calendar.php');
$apiConfig['use_objects'] = true;
$client = new Google_Client();
$client->setApplicationName("PHP Mook");

// APIキーの設定
$client->setClientId("317125129650-220q83jq4ekr1sspieosrerg3e01o171.apps.googleusercontent.com");
$client->setClientSecret("kWu6dJQRJtsLWUBlxak290kG");
$client->setRedirectUri("http://foo.com/oauth2callback");
$client->setDeveloperKey("AIzaSyBY3pgqQMrYdKI5c_Vyou9zP_mVhgV_qs0");

// アクセストークンの設定
$client->setAccessToken('ya29.GltKBIfQ6s5tt-LGrGdH-skJOGPrw13SB-DiKJDrvXEv04wp9tcmoqpC8pHTSqhloX5lw1N6HWSPTPWiUVsgaA7OLU48aB05gw4CJq8YHQdROeGs6z2dHkpMAQvB');

$cal = new Google_Service_Calendar($client);

// カレーンダー一覧を取得する
// Goo;e_sercice_Calendar_calendarList_Resource
$cal_list = $cal->calendarList;
$list = $cal_list->listCalendarList();

foreach($list as $item){
  $item instanceof Google_Service_Calendar_CalendarListEntity;
  print sprintf("<h3>%s</h3>", $item->summary);

  // 取得したカレンダー一覧から対象のカレンダーを選択する
  $cal_id = $item->id;
  $timeMax = "2014-03-03T00:00:00+09:00";
  $timeMin = "2014-03-03T00:00:00+09:00";
  $opts = [
    'timeMax' => $timeMax,
    'timeMin' => $timeMin,
    'orderBy' => 'startTime',
    'singleEvents' => true,
  ];
  // Google_Service_Calendar_Events_Resource
  $events = $call->events;
  $event_list = $events->listEvents($call_id, $opts);

  // 取得したイベントを表示する
  print "<ul>";
  foreach($event_list->items as $item){
    print "<li>";
    if($item->getStart()->getDateTime()  ){
      $start = date('Y/m/d H:i', strtotime($item->getStart()->getDateTime() )  );
      $end = date('Y/m/d H:i', strtotime($item->getEnd()->getDateTime() )  );
      print sprintf("<span>%s - %s</span>", $item->getStart()->getDate(), $item->getEnd()->getDate() );
    }
    print sprintf("<p>%s</p>", htmlspecialchars($item->getSummary() )  );
    print"</li>";
  }
  print"</ul>";
}
