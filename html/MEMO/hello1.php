<?php
if (isset($_POST['voice'])){
    $voice = $_POST['voice'];
    $num = substr($voice, 48);
//exec関数
echo exec('phantomjs /var/www/html/hello.js '.$voice.' > /var/www/html/mp3/article'.$num.'.txt');
echo exec('jsay_make /var/www/html/mp3/article'.$num.'.txt /var/www/html/mp3/article'.$num.'.mp3');

/*
use JonnyW\PhantomJs\Client;
use JonnyW\PhantomJs\DependencyInjection\ServiceContainer;

// スクリプトファイル（.proc）が設置してあるディレクトリ
$location = '/var/www/html';

$serviceContainer = ServiceContainer::getInstance();
$procedureLoader = $serviceContainer->get('procedure_loader_factory')->createProcedureLoader($location);

$client = Client::getInstance();

// スクリプトファイル名を指定（拡張子は除く）
$client->setProcedure('hello');
$client->getProcedureLoader()->addLoader($procedureLoader);

$request = $client->getMessageFactory()->createRequest();
$response = $client->getMessageFactory()->createResponse();

// スクリプト実行
$client->send($request, $response);

// 結果を取得（Phantom JS の標準出力）
$result = $response->getContent(); */
}
?>
