<?php
function errorBox($errorMessage)
{
	?>
	<div class="boxes">
		<div class="box">
			<!-- the login radio trigger -->
			<input type="radio" name="box" id="errorBox" checked>
			<!-- the login form -->
			<form>
				<h3>Erreur</h3>
				<label for=none>X</label>
				<p><?php echo $errorMessage; ?></p>
			</form>
		</div>
	</div>
	<?php
}

