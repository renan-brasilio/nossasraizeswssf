<?php

// WEB Routes

// Método para atualizar a Temperatura e Umidade
Route::get('/tempeumid/{temperatura}/{umidade}/{param}', function($temperatura, $umidade, $param){

	$curl = curl_init();

	curl_setopt_array($curl, array(
	    CURLOPT_URL => "https://nossasraizes-developer-edition.na59.force.com/fake_rest?temperatura".$param."=".$temperatura."&umidade".$param."=".$umidade."",
	    CURLOPT_RETURNTRANSFER => true,
	    CURLOPT_ENCODING => "",
	    CURLOPT_TIMEOUT => 30000,
	    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	    CURLOPT_CUSTOMREQUEST => "GET",
	    CURLOPT_HTTPHEADER => array(
	        'Content-Type: application/json',
	        'Accept: application/json',
	        'Cache-Control: no-cache', 
            'Pragma: no-cache', 
	    ),
	    CURLOPT_FRESH_CONNECT => true,
	    CURLOPT_FORBID_REUSE => true,
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);
	curl_close($curl);

	if ($err) return "cURL ERRO#:" . $err;
	else return "Heroku: Integrado com sucesso.";
});

// Janelas e Cortinas - Get estado
Route::get('/getestado/{param}', function($param){

	$curl = curl_init();

	curl_setopt_array($curl, array(
	    CURLOPT_URL => "https://nossasraizes-developer-edition.na59.force.com/fake_rest",
	    CURLOPT_RETURNTRANSFER => true,
	    CURLOPT_ENCODING => "",
	    CURLOPT_TIMEOUT => 30000,
	    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_NONE,
	    CURLOPT_CUSTOMREQUEST => "GET",
	    CURLOPT_HTTPHEADER => array(
	        'Content-Type: application/json',
	        'Accept: application/json',
	        'Cache-Control: no-cache', 
            'Pragma: no-cache', 
	    ),
	    CURLOPT_FRESH_CONNECT => true,
	    CURLOPT_FORBID_REUSE => true,
	    CURLOPT_HTTPGET => true,
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);
	curl_close($curl);

	$json = json_decode($response, true);

	if ($err) return "cURL ERRO#:" . $err;
	else return $json[$param];
});

// Janelas e Cortinas - Verificação de estado
Route::get('/verificaestado/{param}', function($param){

	$curl = curl_init();

	curl_setopt_array($curl, array(
	    CURLOPT_URL => "https://nossasraizes-developer-edition.na59.force.com/fake_rest?verificaestado=".$param."",
	    CURLOPT_RETURNTRANSFER => true,
	    CURLOPT_ENCODING => "",
	    CURLOPT_TIMEOUT => 30000,
	    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	    CURLOPT_CUSTOMREQUEST => "GET",
	    CURLOPT_HTTPHEADER => array(
	        'Content-Type: application/json',
	        'Accept: application/json',
	        'Cache-Control: no-cache', 
            'Pragma: no-cache', 
	    ),
	    CURLOPT_FRESH_CONNECT => true,
	    CURLOPT_FORBID_REUSE => true,
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);
	curl_close($curl);

	if ($err) return "cURL ERRO#:" . $err;
	else return $param;
});