<?php
include_once 'dbConnector.php';
include_once 'account.php';
session_start();
if (isset($_REQUEST['email']) && $_REQUEST['identifiant'] && $_REQUEST['password']) safeRegister();
if (isset($_REQUEST['identifiant']) && $_REQUEST['password']) safeLogin();
if (isset($_REQUEST['disconnect'])) {
	unset($_SESSION['auth']);
	session_destroy();
}
if (isset($_REQUEST['titre']) && isset ($_FILES['fichier']) &&$_REQUEST['addDocument']) safeAddDocument();


function safeAddDocument()
{
// sécurisation des données ajoutées
	$titre = filter_var($_REQUEST['titre'], FILTER_SANITIZE_STRING);
	$fileName = preg_replace( '/[^a-z0-9\._-]+/i', '-', removeAccents($titre) ) . date("-Y-m-d_H-i-s");
	// TODO: sécurise l'upload de fichier avec phpMussel, php-ClamAV ou autre antivirus
   // enregistrement des fichiers dans le upload
    $dossier= 'upload/';
    $infoFichier = pathinfo($_FILES['fichier']['name']);
    $fileUrl = $dossier . $fileName . "." . $infoFichier['extension'];
    if( move_uploaded_file( $_FILES['fichier']['tmp_name'], $fileUrl ) )
    {
        // ajout à la base de données

        //information à l'utilisateur du bon déroulement de l'opération
        include_once 'pages/partials/errorBox.php';
        infoBox('Upload effectué avec succès !', 'Merci');
    }
    else
    {
        include_once 'pages/partials/errorBox.php';
        infoBox("Echec de l'upload !");
    }

}
function removeAccents($str, $charset='utf-8')
{
    $str = htmlentities($str, ENT_NOQUOTES, $charset);

    $str = preg_replace('#&([A-za-z])(?:acute|cedil|caron|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', $str);
    $str = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $str); // pour les ligatures e.g. '&oelig;'
    $str = preg_replace('#&[^;]+;#', '', $str); // supprime les autres caractères

    return $str;
}

function safeRegister()
{
	// sécurisation des données utilisateur
	$emailClean = filter_var($_REQUEST['email'], FILTER_SANITIZE_EMAIL);
	$email = filter_var($emailClean, FILTER_VALIDATE_EMAIL);
	$identifiantClean = filter_var($_REQUEST['identifiant'], FILTER_SANITIZE_STRING);
	if (strlen($identifiantClean) > 20) $identifiant = '';
	else $identifiant = $identifiantClean;
	$password = filter_var($_REQUEST['password'], FILTER_SANITIZE_STRING);

	/*
	 * si email, l'identifiant ou le mdp est vide, ballancer une erreur.
	 */
	if (!$email || !$identifiant || !$password) {
		throw new Exception('tentative de hacking ou sécurité excessive', 403);

	}

	// chargement du gestionnaire de compte

	$_SESSION['auth'] = new Account(new DbConnector);
	$_SESSION['auth']->create($email, $identifiant, $password);


}

function safeLogin()
{
	// sécurisation des données utilisateur
	$identifiantClean = filter_var($_REQUEST['identifiant'], FILTER_SANITIZE_STRING);
	if (strlen($identifiantClean) > 20) $identifiant = '';
	else $identifiant = $identifiantClean;
	$password = filter_var($_REQUEST['password'], FILTER_SANITIZE_STRING);

	/*
	 * si l'identifiant ou le mdp est vide, balancer une erreur.
	 */

	// chargement du gestionnaire de compte


	$_SESSION['auth'] = new Account(new DbConnector);
	try {
		$_SESSION['auth']->login($identifiant, $password);
	} catch (Exception $e) {
		include_once 'pages/partials/errorBox.php';
		infoBox($e->getMessage());
	}

}
