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
    	$this->email = $email;
    	$this->username = $username;
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

	function getUsername(){
		return $this->username;
	}

	function loginByUsername($username, $password){
		$this->username = $username;
		$fields = ['username', 'password', 'email', 'ranks'];
		$filters = ['username'=>$username];
		$data = $this->db->get('users', $fields, $filters);
		$pieces = explode(',', $data['ranks']);
		$this->ranks = $pieces;
	}
}