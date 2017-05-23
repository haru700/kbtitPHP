<?php
// ファイルをDLして取得
// ファイル情報の取得
$file_id = $_GET['file_id'];
$file = $drive->files->get($file_id);

$url = $file->getDownloadUrl();
if($url){
  // DLできるファイルの場合にはデータを取得
  $request = new Google_Http_Request($url, 'GET', null, null);
  $auth = $client->getAuth();
  $httpRequest = $auth->authenticatedRequest($request);
  $httpRequest instanceof Google_Http_Request;
  if($httpRequest->getResponseHttpCode() == 200){
    header('Content-Type:'. $file->getFileSize() );
    header('Content-Length:'. $file->getFileSize() );
    print $httpRequest->getResponseBody();
  }else{
    die("error :". $httpRequest->getResponseHttpCode() );
  }
}else{
  // DLできないファイルの場合は、代わりにリンクを表示
  $url = $file->getAlternateLink();
  print sprintf("<a href='%s'>%s</a>", $url, $file->title);
}
