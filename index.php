<?php 
require 'vendor/autoload.php';

use GuzzleHttp\Client;
use DiDom\Document;

$client = new Client();
$url = 'https://www.bca.co.id/id/informasi/kurs';
$userAgent = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36';

$headers = [
    'User-Agent' => $userAgent,
];

$response = $client->get($url, [
    'headers' => $headers,
]);

$html = (string) $response->getBody();

$document = new Document($html);
$elem = $document->find('table.m-table-kurs > tbody > tr[code="USD"] > td > p[rate-type="ERate-buy"]');
echo $elem[0]->html();
