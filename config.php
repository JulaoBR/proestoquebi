<?php
require 'environment.php';

$config = array();

if(ENVIRONMENT == 'development'){
    define("BASE_URL", "http://localhost/proestoquebi/");
    $config['dbname'] = 'netpdv20';
    $config['host']   = 'localhost';
    $config['dbuser'] = 'root';
    $condig['dbpass'] = '';
}else{
    define("BASE_URL", "");
    $config['dbname'] = '';
    $config['host']   = '';
    $config['dbuser'] = '';
    $condig['dbpass'] = '';
}

global $db;

try{
    $db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'], $config['dbuser'], $condig['dbpass']);
}catch(PDOException $e){
    echo "ERRO: ".$e->getMessage();
    exit;
}