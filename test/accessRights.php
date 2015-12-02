<?php

require_once(dirname(__FILE__) . '/../src/accessRights.php');

class MockAnyClass {function definedMethod (){return true;}}

class testAccessRights extends UnitTestCase {

	function testInit () {
		$accessRights = new AccessRights (new MockAnyClass);
    	$this->assertIsA($accessRights, "AccessRights");
	}

	function testFailToUseUndefinedMethod () {
		$accessRights = new AccessRights (new MockAnyClass);

		$this->expectException();
		$accessRights->undefinedMethod();
	}

	function testSucceedsToUseAllowedMethod () {
		$accessRights = new AccessRights (new MockAnyClass);
		$accessRights->allow ("User", "definedMethod");
		$accessRights->loggedAsA ("User");
		$this->assertTrue($accessRights->definedMethod());
	}

	function testFailToUseDecoratedMethodIfNotLogged () {
		$accessRights = new AccessRights (new MockAnyClass);

		$this->expectException();
		$accessRights->definedMethod();
	}

	function testFailToUseDecoratedMethodIfUnallowed () {
		$accessRights = new AccessRights (new MockAnyClass);
		$accessRights->loggedAsA ("User");

		$this->expectException();
		$accessRights->definedMethod();
	}

	function testFailToUseNotAllowedMethod () {
		$accessRights = new AccessRights (new MockAnyClass);
		$accessRights->allow ("User", "notTheMethodWeUse");
		$accessRights->loggedAsA ("User");

		$this->expectException();
		$accessRights->definedMethod();
	}

	function testSucceedsToUseAnAllowedMethodFromMultipleAuthorizations () {
		$accessRights = new AccessRights (new MockAnyClass);
		$accessRights->allow ("User", "definedMethod");
		$accessRights->allow ("User", "notTheMethodWeUse");
		$accessRights->loggedAsA ("User");
		$this->assertTrue($accessRights->definedMethod());
	}

	function testSucceedsToUseUserAllowedMethodAsAdmin () {
		$accessRights = new AccessRights (new MockAnyClass);
		$accessRights->allow ("User", "definedMethod");
		$accessRights->loggedAsA ("Admin");
		$accessRights->loggedAsA ("User");
		$this->assertTrue($accessRights->definedMethod());
	}

	function testSucceedsToUseUserAndAdminAllowedMethod () {
		$accessRights = new AccessRights (new MockAnyClass);
		$accessRights->allow ("User", "definedMethod");
		$accessRights->allow ("Admin", "definedMethod");
		$accessRights->loggedAsA ("User");
		$this->assertTrue($accessRights->definedMethod());
	}

}