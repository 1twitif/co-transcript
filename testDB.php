<?php

/*se connecter à la db
créer une table si !table
ajouter un champ de comptage si !
lire le champ de comptage
augmenter de 1 le résultat
le restocker en base
l'afficher*/

$sql["connect"]=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD)or die ("Erreur d'identifiants");
$sql["select_base"]=mysql_select_db(DB_NAME,$sql["connect"])or die ("Erreur de connexion à la BDD");


CREATE TABLE test(
id int NOT NULL auto_increment,
jeux varchar(50) NOT NULL,
prix varchar(50) NOT NULL,
PRIMARY KEY(id)
);