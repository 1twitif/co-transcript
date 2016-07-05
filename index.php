<?php

$domain = substr(preg_replace("/[^a-z0-9._-]/", "", $_SERVER["HTTP_HOST"]), 0, 30);
require "config.".$domain.".php";
$uriFragments = explode('/',$_SERVER["REQUEST_URI"]);
$url = array_pop($uriFragments);
$url = explode('?',$url)[0];
if (!$url)
	$url = 'acceuil';

include './src/handler.php';
include './pages/'.$url.'.php';