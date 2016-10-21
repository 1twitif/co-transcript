<?php
function infoBox($infoMessage, $titre = 'Erreur')
{
	?>
	<div class="boxes">
		<div class="box">
			<!-- the login radio trigger -->
			<input type="radio" name="box" id="infoBox" checked>
			<!-- the login form -->
			<form>
				<h3><?php echo $titre; ?></h3>
				<label for=none>X</label>
				<p><?php echo $infoMessage; ?></p>
			</form>
		</div>
	</div>
	<?php
}

