<?php

$domain = substr(preg_replace("/[^a-z0-9._-]/", "", $_SERVER["HTTP_HOST"]), 0, 30);
require "config.".$domain.".php";
$url = array_pop(explode('/',$_SERVER["REQUEST_URI"]));
if (!$url)
	$url = 'acceuil';
include './pages/'.$url.'.php';