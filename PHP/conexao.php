<?php

session_start();

$localhost = "localhost";
$user = "root";
$passw = "";
$banco = "plugin_elinsz";

global $pdo;

try{
    // orientada a objetos com PDO
    $pdo = new PDO("mysql:dbname=".$banco.";host=".$localhost, $user, $passw);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e) {
    echo "ERRO: ".$e->getMenssage();
    exit;
}

?>
