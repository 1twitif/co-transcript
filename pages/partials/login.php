<?php
if (isset($_SESSION['auth']) && $_SESSION['auth']->getUsername()) {
	?>
	<nav id="menu-connexion">
		<!-- labels trigger the associated input -->
		<a href="./"><?php
			if($_SESSION['auth']->haveRank('admin')){
				echo "Administrateur ";
			} else {
				echo "Utilisateur ";
			}
			echo ucfirst($_SESSION['auth']->getUsername());
			?></a>
		<a href="?disconnect">Déconnexion</a>
	</nav>
	<?php
} else {
	?>
	<nav id="menu-connexion">
		<!-- labels trigger the associated input -->
		<label for=signup>Inscription</label>
		<label for=login>Connexion</label>
	</nav>
	<?php
}
?>
<div class="boxes">
	<!-- the no-box radio trigger -->
	<input type=radio name=box id=none>

	<div class="box">
		<!-- the login radio trigger -->
		<input type=radio name=box id=login>
		<!-- the login form -->
		<form method="post" action="./">
			<h3>Connexion</h3>
			<label for=none>X</label>
			<input type="text" name="identifiant" placeholder="Identifiant..." required>
			<input type=password name="password" placeholder="Mot de passe..." required>
			<button type=submit>Valider</button>
		</form>
	</div>
	<div class="box">
		<!-- the signup radio trigger -->
		<input type=radio name=box id=signup>
		<!-- the signup form -->
		<form method="post" action="./">
			<h3>Inscription</h3>
			<label for=none>X</label>
			<input type=email name="email" placeholder="E-mail..." required>
			<input type="text" name="identifiant" placeholder="Identifiant..." required>
			<input type=password name="password" placeholder="Mot de passe..." required>
			<input id="confirmPassword" type=password placeholder="Confirmer le mot de passe..." required>
			<button type=submit>Valider</button>
		</form>
	</div>
</div>
