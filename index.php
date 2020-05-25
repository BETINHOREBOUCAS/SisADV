<?php
session_start();
require 'config.php';

//Sempre que uma classe for instânciada ele vem para este código procurar a classes em cada pasta
spl_autoload_register(function($class){
    //Verificar se o arquivo existe na pasta controllers
    if (file_exists('controllers/'.$class.'.php')) {
        require 'controllers/'.$class.'.php';
    }
    //Verificar se o arquivo existe na pasta models
    else if (file_exists('models/'.$class.'.php')){
        require 'models/'.$class.'.php';
    }
    //Verificar se o arquivo existe na pasta core
    else if (file_exists('core/'.$class.'.php')) {
        require 'core/'.$class.'.php';
    }
});

//Quando estanciar uma classe ele vai verificar em autoload acima
$core = new Core();
$core->run();