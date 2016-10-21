<section><h2>Liste des fichiers à transcrire:</h2>
<?php
require_once(dirname(__FILE__) . '/../../src/document.php');
$documentList = [];
$exempleDocument = new Document;
$exempleDocument->addTitle('Osef À Écrire Encore');
$exempleDocument->addFile('upload/Osef-A-Ecrire-Encore-2016-10-19_21-52-20.txt');
array_push($documentList, $exempleDocument);
$exempleDocument = new Document;
$exempleDocument->addTitle('Osef À Écrire Encore Et [Encore] Passé Équation');
$exempleDocument->addFile('upload/Osef-A-Ecrire-Encore-Et-Encore-Passe-Equation-2016-10-19_21-53-43.txt');
array_push($documentList, $exempleDocument);

/*boucler sur documentList
 * pour chaque document,
 * afficher <a href="url fichier">titre document</a>
 */
foreach ($documentList as $document)
{
    echo '<div><a class="download" href="'. $document->getLastVersion() .'"> '. $document->getTitle() .'</a></div>';
}

if (isset($_SESSION['auth']) && $_SESSION['auth']->haveRank('admin')){
	echo '<label class="button" for="addDocument">Ajouter</label>';
	}
	?>
</section>

<section><h2>Liste des fichiers à relire:</h2>
	<a href="">Lettre n°1</a>
</section>
<?php
include 'addDocument.php';
