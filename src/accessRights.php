<?php

class AccessRights {
	
	var $decoratedObject;
	var $loggedRank = [];
	var $authorizedFunctions = [];

	function __construct($decoratedObject) {
		$this->decoratedObject = $decoratedObject;
	}

	function allow($rank, $methodName) {
		if (!isset($this->authorizedFunctions[$methodName]))
			$this->authorizedFunctions[$methodName] = [];
		$this->authorizedFunctions[$methodName][$rank] = $rank;
	}

	function loggedAsA($rank) {
		$this->loggedRank[] = $rank;
	}

	function __call($methodName, $args) {

		if (!method_exists($this->decoratedObject, $methodName))
			throw new Exception("UndefinedFunction: $methodName",404);

		for ($i=0; $i < sizeof($this->loggedRank); $i++) { 
			
			if (isset($this->authorizedFunctions[$methodName]) 
				&& isset($this->authorizedFunctions[$methodName][$this->loggedRank[$i]]))
		    	return call_user_func_array(
		    		array(
		    			$this->decoratedObject, 
		    			$methodName), 
		    		$args);
		}

		throw new Exception('UnauthorizedAccess: '.$methodName.' as '.json_encode($this->loggedRank),403);
    }
}