<?php
// 登録するカレンダーIDを設定する
$list = $cal->calendarList->listCalendarList();
$cal_id = $list->items[0]->id;

// イベントオブエクトを作成する
$new_event = new Google_Service_Calendar_Event();
$new_event->summary = '初めてのAPIでの予定登録';
$new_event->start = new Google_Service_Calendar_EventDateTime();
$new_event->start->date = "2014-02-14";
$new_event->end = new Google_Service_Calendar_EventDateTime();
$new_event->end->date = "2014-02-15";

// カレンダーにイベントを登録
$ret = $cal->events->insert($cal_id, $new_event);
