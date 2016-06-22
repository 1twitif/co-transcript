<nav id="menu-connexion">
	<!-- labels trigger the associated input -->
	<label for=signup>Inscription</label>
	<label for=login>Connexion</label>
</nav>

<div class="boxes">
	<!-- the no-box radio trigger -->
	<input type=radio name=box id=none>

	<div class="box">
		<!-- the login radio trigger -->
		<input type=radio name=box id=login>
		<!-- the login form -->
		<form>
			<h3>Connexion</h3>
			<label for=none>X</label>
			<input type="text" placeholder="Identifiant...">
			<input type=password placeholder="Mot de passe...">
			<button type=submit>Valider</button>
		</form>
	</div>
	<div class="box">
		<!-- the signup radio trigger -->
		<input type=radio name=box id=signup>
		<!-- the signup form -->
		<form>
			<h3>Inscription</h3>
			<label for=none>X</label>
			<input type=email placeholder="E-mail...">
			<input type="text" placeholder="Identifiant...">
			<input type=password placeholder="Mot de passe...">
			<input type=password placeholder="Confirmer le mot de passe...">
			<button type=submit>Valider</button>
		</form>
	</div>
</div>