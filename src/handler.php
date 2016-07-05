<?php
if($_REQUEST['email'] && $_REQUEST['identifiant'] && $_REQUEST['password']) safeRegister();


function safeRegister(){
    // sécurisation des données utilisateur
    $emailClean = filter_var($_REQUEST['email'], FILTER_SANITIZE_EMAIL);
    $email = filter_var($emailClean, FILTER_VALIDATE_EMAIL);
    $identifiantClean = filter_var($_REQUEST['identifiant'], FILTER_SANITIZE_STRING);
    if(strlen($identifiantClean)>20)$identifiant='';
    else $identifiant = $identifiantClean;
    $password= filter_var($_REQUEST['password'], FILTER_SANITIZE_STRING);

    // chargement du gestionnaire de compte
    

    // création du compte

}