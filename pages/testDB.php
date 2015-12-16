<?php

/*se connecter à la db
créer une table si !table
ajouter un champ de comptage si !
lire le champ de comptage
augmenter de 1 le résultat
le restocker en base
l'afficher*/



try{
    $pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch(Exception $e) {
    echo "Impossible de se connecter à la base de données '".DB_NAME."' sur ".DB_HOST." avec le compte utilisateur '".DB_USER."'";
    echo "<br/>Erreur PDO : <i>".$e->getMessage()."</i>";
    die();
}

function createTable(){
	global $pdo;
	$stats_visites = $pdo->prepare("CREATE TABLE IF NOT EXISTS statsVisites(
		ip char(15),
		pagesVues int,
		PRIMARY KEY (ip))
	");

	$stats_visites->execute();
}

function compteurVisites(){
    global $pdo;
    $ip   = $_SERVER['REMOTE_ADDR'];

    $query = $pdo->prepare("
        INSERT INTO statsVisites (ip , pagesVues) VALUES (:ip , 1)
        ON DUPLICATE KEY UPDATE pagesVues = pagesVues + 1
    ");

    $query->execute(array(
        ':ip'   => $ip
    ));
}

function consulterNbVisites(){
	global $pdo;
	$query = $pdo->prepare("SELECT pagesVues FROM statsVisites");
	$query->execute();

    $result = $query->fetch(PDO::FETCH_ASSOC);
    return $result["pagesVues"];
}

createTable();
compteurVisites();
echo consulterNbVisites();