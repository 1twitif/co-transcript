<?php

require_once(dirname(__FILE__) . '/../src/account.php');

class testAccount extends UnitTestCase {

	function testCreateAccount  () {
		$account = new Account;
		$this->assertIsA($account, "Account");
	}

	function testGetRanks () {
		$rank = 'User';
		$auth = new Account;
		$auth->addRank($rank);
		$this->assertIdentical($auth->getRanks(), [$rank]);
	}

	function testSetRanks () {
		$ranks = ['User', 'Admin'];
		$auth = new Account;
		$auth->setRanks($ranks);
		$this->assertIdentical($auth->getRanks(), $ranks);
	}

	/*function testGetUsername() {
		$username = 'Luc';
		$email = 'a@b.c';
		$password = '1234';
		$auth = new Account($email, $username, $password);
		$this->assertIdentical($auth->getUsername(), $username);
	}
*/

}