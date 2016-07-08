<?php

include 'partials/head.php';
include 'partials/header.php';
$techEmail = "millicent.billette+public@gmail.com";
?>
<section><h2>Responsable contenu</h2>
	photo
	Prénom Nom
	téléphone
	email
	vcard
</section>

<section><h2>Responsable technique</h2>
	<img class="photo" src="https://www.gravatar.com/avatar/<?php echo md5($techEmail); ?>?s=200">
	<address>
		<strong>Millicent Billette</strong>
		<a href="tel:+33770772770">0 770 772 770 (mobile non surtaxé)</a>
		<a href="mailto:<?php echo $techEmail; ?>?subject=[co-transcript]"><?php echo $techEmail; ?></a>
		<a href="static/millicent-billette.vcf">Importer la vCard dans mes contacts</a>
	</address>
</section>
<?php

include 'partials/footer.php';
