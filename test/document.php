<?php

require_once(dirname(__FILE__) . '/../src/document.php');

class MockReservationStillActive {function isExpired (){return false;}}
class MockReservationExpired {function isExpired (){return true;}}

class TestDocument extends UnitTestCase {
    function testCanCreateDocument() {
    	$doc = new Document;
    	$this->assertIsA($doc, 'Document');
    }

    function testAddFileToDocument() {
    	$doc = new Document;
    	$doc->addFile('monscan.jpg');
    	$this->assertEqual($doc->getScan(), 'monscan.jpg');
    }

    function testGetLastVersion() {
    	$doc = new Document;
    	$doc->addFile('monscan.jpg');
    	$doc->addFile('monFichier.jpg');
    	$this->assertEqual($doc->getLastVersion(), 'monFichier.jpg');
    }

    function testIsReserved() {
		$doc = new Document;
    	$doc->addReservation(new MockReservationStillActive);
    	$this->assertTrue($doc->isReserved());
    }

    function testNoReservation() {
    	$doc = new Document;
    	$this->assertFalse($doc->isReserved());
    }

    function testExpiredReservation() {
    	$doc = new Document;
    	$doc->addReservation(new MockReservationExpired);
    	$this->assertFalse($doc->isReserved());
    }

    function testMultipleReservations() {
    	$doc = new Document;
    	$doc->addReservation(new MockReservationStillActive);
    	$doc->addReservation(new MockReservationExpired);
    	$this->assertTrue($doc->isReserved());
    }
}

