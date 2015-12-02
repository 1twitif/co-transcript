<?php

class Account {

	var $ranks = [];
	var $username;
	var $email;
	var $password;

	function __construct() {
		$nbArguments = func_num_args();
    	$args = func_get_args();
    	var_dump($args);
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
}