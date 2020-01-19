<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Project;

/**
 * Description of readApi
 *
 * @author Esveraldo
 */
class ReadApi {

    public function apiEspecialidade($url) {
        try {
            $Base_URL = $url;
            $token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJmZWVnb3ciLCJhdWQiOiJwdWJsaWNhcGkiLCJpYXQiOiIxNy0wOC0yMDE4IiwibGljZW5zZUlEIjoiMTA1In0.UnUQPWYchqzASfDpVUVyQY0BBW50tSQQfVilVuvFG38";
            $opts = array(
                'http' => array(
                    'method' => "GET",
                    'header' => "Content-Type: application/json en\r\n" .
                    "x-access-token: " . $token . "\r\n"
                )
            );
            $response = file_get_contents($Base_URL, false, stream_context_create($opts));
            $dados = json_decode($response, true);
            return $dados['content'];
        } catch (Exception $e) {
            echo 'Erro: ' . $e->getMessage();
        }
    }

    public function apiProfessional($url) {
        try {
            $Base_URL = $url;
            $token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJmZWVnb3ciLCJhdWQiOiJwdWJsaWNhcGkiLCJpYXQiOiIxNy0wOC0yMDE4IiwibGljZW5zZUlEIjoiMTA1In0.UnUQPWYchqzASfDpVUVyQY0BBW50tSQQfVilVuvFG38";

            $opts = array(
                'http' => array(
                    'header'=> "Access-Control-Allow-Origin: *",
                    'method' => "GET",
                    'ignore_errors' => true,
                    'header' => "Content-Type: application/json en\r\n" .
                    "x-access-token: " . $token . "\r\n" .
                    "User-Agent: Mozilla/5.0 (iPad; U; CPU OS 3_2 like Mac OS X; en-us) AppleWebKit/531.21.10 (KHTML, like Gecko) Version/4.0.4 Mobile/7B334b Safari/531.21.102011-10-16 20:23:10\r\n",
                )
            );
            $response = file_get_contents($Base_URL, false, stream_context_create($opts));
            $dados = json_decode($response, true);

            return $dados;
        } catch (Exception $e) {
            echo 'Erro: ' . $e->getMessage();
        }
    }
}
