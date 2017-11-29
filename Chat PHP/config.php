<?php

session_start();

//declaração dos namespaces dos controladores e instanciação dos objetos
use Project\Controller\ TesteController;
$testeController = new TesteController();

use Project\Controller\LoginController;
$loginController = new LoginController();


//configuração do banco de dados
$_ENV['config'] = [
    'host' => 'localhost',
    'dbname' => 'mydb',
    'user' => 'root',
    'password' => ''
];
