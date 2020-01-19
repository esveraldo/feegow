<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once '../vendor/autoload.php';

set_time_limit(0);
ini_set('display_errors', 1);
error_reporting(E_ALL);

use App\DI\Container;
$api = Container::getReadApi();

echo '<pre>';
echo count($api->apiProfessional("https://api.feegow.com.br/api/professional/list")["content"][157]) . "<br>";
echo $api->apiProfessional("https://api.feegow.com.br/api/professional/list")["content"][157]["nome"] . "<br>";
echo $api->apiProfessional("https://api.feegow.com.br/api/professional/list")["content"][157]["foto"] . "<br>";
echo "CRM" . $api->apiProfessional("https://api.feegow.com.br/api/professional/list")["content"][157]["documento_conselho"] . "<br>";
echo $api->apiProfessional("https://api.feegow.com.br/api/professional/list")["content"][157]["especialidades"][0]["especialidade_id"] . "<br>";
echo $api->apiProfessional("https://api.feegow.com.br/api/professional/list")["content"][157]["especialidades"][0]["nome_especialidade"];
echo '</pre>';

echo '<pre>';
var_dump($api->apiProfessional("https://api.feegow.com.br/api/professional/list")["content"]);
echo '</pre>';


$arrayobject = new ArrayObject($api->apiProfessional("https://api.feegow.com.br/api/professional/list")["content"]);

$iterator = $arrayobject->getIterator();

while($iterator->valid()) {
   
    echo $iterator->key() . ' => ' . $iterator->current()["nome"] . "<br>";
    echo $iterator->key() . ' => ' . $iterator->current()["documento_conselho"] . "<br>";
    echo $iterator->key() . ' => ' . $iterator->current()["especialidades"][0]["especialidade_id"] . "<br><br>";
    $iterator->next();
}


