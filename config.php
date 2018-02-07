<?php
/**
 * config.php -> controle de acesso ao banco 
 *
 * @author Moacir
 */
session_start();

$database = "classificados";
$user_name = "Moacir";
$user_pass = "MoacirjuN2122";

try {
    //$pdo = new PDO("pgsql:host=localhost port=5432 dbname=classificados user="+$user_name+" password="+$user_pass);
    $pdo = new PDO('pgsql:host=localhost port=5432 dbname=projeto_classificados user=Moacir password=MoacirjuN2122');
} catch (Exception $ex) {
    echo 'Erro ao conectar. MSG:', $ex->getMessage();
}



