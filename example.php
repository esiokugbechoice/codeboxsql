<?php
require_once 'vendor/autoload.php';

$host = 'localhost';
$user = 'root';
$pass = '';
$database = 'mailer';

$mysqli = new codeboxsql\mysql($host, $user, $pass, $database);

print_r($mysqli->singleSelect('logs','', 'fetch', ''));

