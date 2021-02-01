
<?php 
session_start();

// On force l'affichage des messages d'erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Chemin des fichiers du partials
const HEADER_PATH = "partials/header.php";
const FOOTER_PATH = "partials/footer.php";
const SECURITY_FORM = "security/form-book.php";

//Titre du site
$title_site = "MA BIBLIOTHEQUE";

// declaration de la varaible date maj auto dasn le footer
$current_year = date("Y");

//liste des genres
$genre_list= ["Choisir un genre","Roman", "Fantastique","Policier"];

?>

<?php

//DATA BASE CONFIG

// def le type de BDD(mysql, postgresql, oracle..)
$db_type = "mysql";

// def l'adresse du serveur
$db_host = "127.0.0.1:8889";

// def le nom d'utilisateur de la BDD
$db_user = "root";

// def password de la BDD
$db_pass = "root";

// def nom de la BDD
$db_schema = "biblio_books";

// def le numéro du port de la BDD (facultatif)
$db_port = 3306;

// def le jeu de caractères utilisé pour la requte(facultatif)
$db_charset = "utf8";

?>

