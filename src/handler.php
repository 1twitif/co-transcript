<?php
if (isset($_REQUEST['email']) && $_REQUEST['identifiant'] && $_REQUEST['password']) safeRegister();
if (isset($_REQUEST['identifiant']) && $_REQUEST['password']) safeLogin();
global $auth;

function safeRegister()
{
	global $auth;
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

	// chargement du gestionnaire de compte
	include_once 'dbConnector.php';
	include_once 'account.php';
	$auth = new Account(new DbConnector);
	$auth->create($email, $identifiant, $password);
}
function safeLogin()
{
	global $auth;
	// sécurisation des données utilisateur
	$identifiantClean = filter_var($_REQUEST['identifiant'], FILTER_SANITIZE_STRING);
	if (strlen($identifiantClean) > 20) $identifiant = '';
	else $identifiant = $identifiantClean;
	$password = filter_var($_REQUEST['password'], FILTER_SANITIZE_STRING);

	/*
	 * si l'identifiant ou le mdp est vide, ballancer une erreur.
	 */

	// chargement du gestionnaire de compte
	include_once 'dbConnector.php';
	include_once 'account.php';

	$auth = new Account(new DbConnector);
	$auth->login($identifiant, $password);
}
