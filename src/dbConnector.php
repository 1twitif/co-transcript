<?php


try {
	$pdo = new PDO('mysql:host='.DB_HOST.';port='.DB_PORT.';dbname='.DB_NAME.';charset=utf8', DB_USER, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
	$fileContent = file_get_contents('src/tables.sql');
	$instructionsSql = explode(";",$fileContent);
	if (!end( $instructionsSql)) array_pop ( $instructionsSql);
	foreach ($instructionsSql as &$value) {
		$pdo->query($value);
		$errorNum = $pdo->errorCode();
		if ($errorNum !== '00000' && $errorNum !== '42S01') {
			throw new Exception($pdo->errorInfo()[2],$errorNum);
		}
	}
}
catch (Exception $e) {
	die('Erreur : ' . $e->getMessage());
}

class DbConnector {

	function get($table, $fields, $filters){
		global $pdo;
		$filterTab = [];
		foreach ($filters as $key => $value)
			$filterTab[] = $key."=\"".$value."\"";
		$filterString = join(" AND ",$filterTab);
		$query = $pdo->prepare("SELECT ".join(",", $fields)." FROM ".$table. " WHERE ".$filterString);
		$query->execute();

    	$result = $query->fetch(PDO::FETCH_ASSOC);
    	return $result;
	}

	function set($table, $fields){
		global $pdo;
		$tab = [];
		$tab2 = [];
		foreach ($fields as $key => $value) {
			$tab[] = $key;
			$tab2[] = "\"".$value."\"";
		}
		$fieldString = join(",",$tab);
		$valueString = join(",",$tab2);
		$query = $pdo->prepare("INSERT INTO $table ($fieldString) VALUES ($valueString)");
		$query->execute();
	}
}