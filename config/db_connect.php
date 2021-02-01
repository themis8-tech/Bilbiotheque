<?php

// Definition de la DSN

$db_dsn = $db_type .":";
$db_dsn.= "host=". $db_host .";";
$db_dsn.= "dbname=". $db_schema .";";
$db_dsn.= "port=". $db_port .";";
$db_dsn.= "charset=". $db_charset .";";


//connexion à la BDD

try {
    $pdo = new PDO($db_dsn, $db_user, $db_pass);

// Demander à pdo d’afficher des erreurs quand il en génère
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
    echo "Echec de connexion : ". $e->getMessage();
    die();
}
