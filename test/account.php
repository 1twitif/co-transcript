<?php

require_once(dirname(__FILE__) . '/../src/account.php');

class mockDBConnector {function get($table, $fields, $filters){
	if ($filters['username'] == 'Luc'){
		return [
			'username'=> 'Luc',
			'password'=>password_hash('1234', PASSWORD_DEFAULT),
			'email'=> 'a@b.c',
			'ranks'=> 'User,Admin'
			];
	}
}}

class testAccount extends UnitTestCase {

	function testCreateAccount() {
		$auth = new Account(new mockDBConnector);
		$this->assertIsA($auth, "Account");
	}

	function testGetRanks() {
		$rank = 'User';
		$auth = new Account(new mockDBConnector);
		$auth->addRank($rank);
		$this->assertIdentical($auth->getRanks(), [$rank]);
	}

	function testSetRanks() {
		$ranks = ['User', 'Admin'];
		$auth = new Account(new mockDBConnector);
		$auth->setRanks($ranks);
		$this->assertIdentical($auth->getRanks(), $ranks);
	}

	function testAccountCreation() {
		$username = 'Luc';
		$email = 'a@b.c';
		$password = '1234';
		$auth = new Account(new mockDBConnector);
		$auth->create($email, $username, $password);
		$this->assertIdentical($auth->getUsername(), $username);
	}

	function testLoginByUsername() {
		$auth = new Account(new mockDBConnector);
		$auth->loginByUsername('Luc', '1234');
		$this->assertIdentical($auth->getRanks(), ['User','Admin']);

	}

	function testGetUsername() {
		$auth = new Account(new mockDBConnector);
		$auth->loginByUsername('Luc', '1234');
		$this->assertIdentical($auth->getUsername(), 'Luc');
	}
}