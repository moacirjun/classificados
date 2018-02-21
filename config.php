<?php
/**
 * config.php -> controle de acesso ao banco 
 *
 * @author Moacir
 */
session_start();

$database = "classificados";
$userName = "Moacir-deV";
$userPass = "MoacirjuN2122";
global $PGSQL_PDO;

try {
    //$pdo = new PDO("pgsql:host=localhost port=5432 dbname=classificados user="+$user_name+" password="+$user_pass);
    $PGSQL_PDO = new PDO("pgsql:host=localhost port=5432 dbname=projeto_classificados user=$userName password=$userPass");
} catch (Exception $ex) {
    echo 'Erro ao conectar. MSG:', $ex->getMessage();
}



