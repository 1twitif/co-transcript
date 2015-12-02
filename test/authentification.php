<?php

require_once(dirname(__FILE__) . '/../src/authentification.php');

class testAuthentification extends UnitTestCase {

	function testCreateAuthentification  () {
		$authentification = new Authentification;
		$this->assertIsA($authentification, "Authentification");
	}

	function testGetRank () {
		$rank = 'User';
		$auth = new Authentification;
		$auth->setRank($rank);
		$this->assertIdentical($auth->getRank(), $rank);
	}




}