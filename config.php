<?php

date_default_timezone_set("America/Sao_Paulo");

define('BASE', 'http://localhost/admin-platform-factory');
define('SITE_BASE', 'https://platformfactory.co.uk');

$pdo = new PDO('mysql:host=localhost;dbname=platform-factory', 'phpmyadmin', 'lucas123');
$pdo->exec("set names utf8");

$url = (isset($_GET['url']) ? $_GET['url'] : 'home');
$explode = explode('/', $url);

session_start();
?>
