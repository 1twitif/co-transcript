<?php

class AccessRights {
	
	var $decoratedObject;
	var $loggedRank;

	function __construct ($decoratedObject) {
		$this->decoratedObject = $decoratedObject;
	}

	function allow($rank, $functionName) {
		
	}

	function loggedAsA($rank) {
		$this->loggedRank = $rank;
	}

	function __call($method_name, $args) {

		if (!method_exists($this->decoratedObject, $method_name))
			throw new Exception("UndefinedFunction: $method_name",404);

		if ($this->loggedRank != "User")
			throw new Exception("UnauthorizedAccess: $method_name as $this->loggedRank",403);

    	return call_user_func_array(array($this->decoratedObject, $method_name), $args);
    }
}