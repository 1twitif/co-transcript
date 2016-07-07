<?php

class Account {

	var $ranks = [];
	var $username;
	var $email;
	var $db;

	function __construct($dbConnector) {
		$this->db = $dbConnector;
	}

	function create($email, $username, $password) {
    	$fields = [];
    	$fields['username'] = $username;
    	$fields['password'] = password_hash($password, PASSWORD_DEFAULT);
    	$fields['email'] = $email;
    	$fields['ranks'] = 'user';
    	$this->db->set('users', $fields);
    	$this->login($email, $password);
	}

	function getRanks() {
		return $this->ranks;
	}

	function addRank($rank){
		$this->ranks[] = $rank;
	}

	function setRanks($ranks){
		$this->ranks = $ranks;
	}
	function haveRank($rank){
		return in_array($rank, $this->ranks);
	}

	function getUsername(){
		return $this->username;
	}

	function loginByUsername($username, $password){
		return $this->loginCustom('username', $username, $password);
	}

	function loginByEmail($email, $password){
		return $this->loginCustom('email', $email, $password);
	}

	function loginCustom($type, $id, $password){
		$fields = ['username', 'password', 'email', 'ranks'];
		$filters = [$type=>$id];
		$data = $this->db->get('users', $fields, $filters);
		if (!$data) {
    		throw new Exception ("UnknownAccount", 401);
    	}
    	if (!password_verify($password, $data['password'])) {
    		throw new Exception ("WrongPassword", 401);
    	}
		$pieces = explode(',', $data['ranks']);
		$this->ranks = $pieces;
		$this->email = $data['email'];
		$this->username = $data['username'];
	}

	function login($smartId, $password){
		$emailPattern = '/^.+@.+\.[a-z]{2,}$/';
		if (preg_match($emailPattern, $smartId))
			return $this->loginByEmail($smartId, $password);
		return $this->loginByUsername($smartId, $password);
	}
}
