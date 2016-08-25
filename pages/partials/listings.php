<section><h2>Liste des fichiers à transcrire:</h2>
<?php
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
