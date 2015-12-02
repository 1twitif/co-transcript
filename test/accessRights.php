<?php

require_once(dirname(__FILE__) . '/../src/accessRights.php');

class MockAnyClass {function definedFunction (){return true;}}

class testAccessRights extends UnitTestCase {

	function testInit () {
		$accessRights = new AccessRights (new MockAnyClass);
    	$this->assertIsA($accessRights, 'AccessRights');
	}

	function testFailToUseUndefinedFunction () {
		$accessRights = new AccessRights (new MockAnyClass);

		$this->expectException();
		$accessRights->undefinedFunction();
	}

	function testSucceedsToUseAllowedFunction () {
		$accessRights = new AccessRights (new MockAnyClass);
		$accessRights->allow ("User", "definedFunction");
		$accessRights->loggedAsA ("User");
		$this->assertTrue($accessRights->definedFunction());
	}

	function testFailToUseDecoratedFunctionIfNotLogged () {
		$accessRights = new AccessRights (new MockAnyClass);

		$this->expectException();
		$accessRights->definedFunction();
	}

	//function testFailToUseDecoratedFunctionIfNotAllowed () {
		//$accessRights = new AccessRights (new MockAnyClass);
		//$accessRights->loggedAsA ("User");

		//$this->expectException();
		//$accessRights->definedFunction();
	//}

}