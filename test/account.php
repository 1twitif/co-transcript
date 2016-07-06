<?php

require_once(dirname(__FILE__) . '/../src/account.php');

class mockDBConnector {
	function get($table, $fields, $filters){
		if (
			(isset($filters['username'])
				&& $filters['username'] == 'Luc')
			|| (isset($filters['email'])
				&& $filters['email'] =='a@b.cd')){
			return [
				'username'=> 'Luc',
				'password'=>password_hash('1234', PASSWORD_DEFAULT),
				'email'=> 'a@b.cd',
				'ranks'=> 'User,Admin'
			];
		}
	}
	function set($table, $fields){}
}

class mockDBConnectorStore{
	var $persist = [];

	function get($table, $fields, $filters){
		foreach ($this->persist[$table] as $line) {
			$match = true;
			foreach ($filters as $key => $value)
				if($line[$key]!=$value)
					$match = false;
			if($match) return $line;
		}
	}

	function set($table, $fields){
		if(!isset($this->persist[$table]))
			$this->persist[$table] = [];
		$this->persist[$table][] = $fields;
	}
}

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
	function testhaveRank() {
		$auth = new Account(new mockDBConnector);
		$ranks = ['User', 'Admin'];
		$auth->setRanks($ranks);
		$this->assertIdentical($auth->haveRank('Admin'), true);
	}

	function testAccountCreation() {
		$username = 'Luc';
		$email = 'a@b.cd';
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

	function testLoginFailBadPassword() {
		$auth = new Account(new mockDBConnector);

		$this->expectException();
		$auth->loginByUsername('Luc', 'Wrong password');
	}

	function testLoginByEmail() {
		$auth = new Account(new mockDBConnector);
		$auth->loginByEmail('a@b.cd', '1234');
		$this->assertIdentical($auth->getRanks(), ['User','Admin']);
	}

	function testSmartLoginEmail() {
		$auth = new Account(new mockDBConnector);
		$auth->login('a@b.cd', '1234');
		$this->assertIdentical($auth->getRanks(), ['User','Admin']);
	}

	function testSmartLoginUsername() {
		$auth = new Account(new mockDBConnector);
		$auth->login('Luc', '1234');
		$this->assertIdentical($auth->getRanks(), ['User','Admin']);
	}

	function testMultipleCreations() {
		$db = new mockDBConnectorStore;
		$auth = new Account($db);
		$auth->create('a@b.cd', 'Luc', '1234');
		$auth = new Account($db);
		$auth->create('e@f.gh', 'Luke', '5678');
		$auth = new Account($db);
		$auth->login('Luc', '1234');
		$this->assertIdentical($auth->getUsername(), 'Luc');
	}

	function testDefaultRanks() {
		$db = new mockDBConnectorStore;
		$auth = new Account($db);
		$auth->create('a@b.cd', 'Luc', '1234');
		$auth = new Account($db);
		$auth->login('Luc', '1234');
		$this->assertIdentical($auth->getRanks(), ['user']);
	}
}
