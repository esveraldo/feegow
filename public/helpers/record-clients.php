<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once '../../vendor/autoload.php';

use App\DI\Container;


$specialty_id = filter_input(INPUT_POST, 'specialty_id', FILTER_DEFAULT);
$professional_id = filter_input(INPUT_POST, 'professional_id', FILTER_DEFAULT);
$name = filter_input(INPUT_POST, 'name', FILTER_DEFAULT);
$cpf  = filter_input(INPUT_POST, 'cpf', FILTER_DEFAULT);
$source_id = filter_input(INPUT_POST, 'source_id', FILTER_DEFAULT);
$birthdate = filter_input(INPUT_POST, 'birthdate', FILTER_DEFAULT);
$date_time = filter_input(INPUT_POST, 'date_time', FILTER_DEFAULT);

//Inserindo dados no cliente
$insertDados = Container::getInsert();
$insertDados->setSpecialty_id($specialty_id)
        ->setProfessional_id($professional_id)
        ->setName($name)
        ->setCpf($cpf)
        ->setSource_id($source_id)
        ->setBirthdate($birthdate)
        ->setDateTime($date_time);
$result = $insertDados->insert();


$response = array("status" => null, "success" => null, "message" => null);

if($result != false){
    
    $response = array("status" => "success", "message" => "success");
    
}else{
    $response = array("status" => "failed", "message" => "failed");
}

echo json_encode($response);

