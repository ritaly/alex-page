<?php
header("Access-Control-Allow-Origin: *");
require "vendor/autoload.php";
use PHPHtmlParser\Dom;

$dom = new Dom;
$dom->load('https://www.siepomaga.pl/doitforalex');
$html = $dom->find('div.can-container', 0);

$puszkaDoItForAlex = [];
	//$paymentsCount = $html->find('span.payments-count')->text();
	$amount = $html->find('span.amount')->getAttribute('data-value');
	$perc = $html->find('div.can-percentage')->getAttribute('data-value');
	$goal = preg_replace("/[^0-9]/", "", $html->find('span.goal')->text());


   
    $puszkaDoItForAlex[] = [
      //'paymentsCount' => $paymentsCount,
      'amount' => $amount,
	  'percentage' => $perc,
	  'goal' =>  $goal
	  //'amount_left' => $goal - $amount
    ];
    
header('Content-Type: application/json');
echo json_encode($puszkaDoItForAlex, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT | JSON_UNESCAPED_UNICODE);