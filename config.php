<?php

date_default_timezone_set("America/Sao_Paulo");

//define('BASE', 'http://admin.platformfactory.co.uk');
define('BASE', 'http://localhost/adm-platform-factory');
define('SITE_BASE', 'https://platformfactory.co.uk');

//$pdo = new PDO('mysql:host=localhost;dbname=u207526276_platformfactor', 'u207526276_platformfactor', 'Platform@*2020');
$pdo = new PDO('mysql:host=localhost;dbname=platform-factory', 'root', '');
$pdo->exec("set names utf8");

$url = (isset($_GET['url']) ? $_GET['url'] : 'home');
$explode = explode('/', $url);

session_start();
?>
