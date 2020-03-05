<?php

$servername = 'localhost:3307';
$dbusername = "root";
$dbpwd = '';
$dbname = "loginsystemdb";
try{
$dsn = 'mysql:host=' . $servername . ';dbname=' . $dbname;
$pdo = new PDO ($dsn, $dbusername, $dbpwd);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOEXCEPTION $e){
echo 'Connection Failed' . $e->getMesage();
}