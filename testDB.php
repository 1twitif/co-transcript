<?php
include('config.localhost.php');

try {
	$bdd = new PDO('mysql:host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASSWORD);
	$fileContent = file_get_contents('src/tables.sql');
	$instructionsSql = explode(";", $fileContent);
	if (!end($instructionsSql)) array_pop($instructionsSql);
	foreach ($instructionsSql as &$value) {
		$bdd->query($value);
		$errorNum = $bdd->errorCode();
		if ($errorNum !== '00000' && $errorNum !== '42S01') {
			throw new Exception($bdd->errorInfo()[2], $errorNum);
		}
	}
	
} catch (Exception $e) {
	die('Erreur : ' . $e->getMessage());
}
