<?php
$url = array_pop(explode('/',$_SERVER["REQUEST_URI"]));
if (!$url)
	$url = 'acceuil';
include './pages/'.$url.'.php';
