<?php
require_once "vendor/autoload.php";

use Predis\Client;

$environmentConfig = parse_ini_file('env.ini');

define('news_api', $environmentConfig['news_api']);

$client = new Client([
    'host' => $environmentConfig['host'],
    'port' => $environmentConfig['port'],
    'read_write_timeout' => $environmentConfig['read_write_timeout']
]);

$news = $client->get('news');

$timeCache = 60; // time in seconds

if (!$news) {
    $news = json_encode(simplexml_load_file(news_api));
   
    $client->set('news', $news, 'EX', $timeCache);
}

$news = json_decode($news);

echo "Total de notícias: ".count($news->noticia);
echo "<br><br>";
foreach($news->noticia as $key => $noticia) {
    echo "ID: {$key}<br>";
    echo "Titulo: {$noticia->titulo}<br>";
    echo "Data: {$noticia->data_publicacao}<br>";
    echo "Veículo: {$noticia->veiculo}";
    echo "<br><br>";
}
