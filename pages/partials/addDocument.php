<div class="boxes">
	<div class="box">
		<!-- the login radio trigger -->
		<input type=radio name=box id=addDocument>
		<!-- the login form -->
		<form method="post" action="./" enctype="multipart/form-data">
			<h3>Nouveau Document</h3>
			<label for=none>X</label>
			<input type="hidden" name="MAX_FILE_SIZE" value="5Mo"/>
            <input type="hidden" name="addDocument" value="true"/>
			<input type=file name="fichier" required>
			<input type="text" name="titre" placeholder="Titre..." required>
			<button type=submit>Valider</button>
	</div>
</div>
