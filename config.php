<?php
require 'environment.php';

$config = array();

//Se estiver usando no servidor local
if (ENVIRONMENT == 'development') {
    define("BASE_URL", "http://localhost/php_zero_profissional/Advogado/");
    $config['dbname'] = 'advogado';
    $config['host'] = 'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = '';
}else {
    define("BASE_URL", "http://meusite.com.br");
    $config['dbname'] = 'estrutura_mvc';
    $config['host'] = 'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = '';
}

global $db;
try {
    $db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'], $config['dbuser'], $config['dbpass']);
} catch (PDOException $e) {
    echo "ERRO: ".$e->getMessage();
    exit;
}