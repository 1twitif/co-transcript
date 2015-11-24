<?php

require_once(dirname(__FILE__) . '/../src/document.php');

class MockReservation {}
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
    	$doc->addReservation(new MockReservation);
    	$this->assertEqual($doc->isReserved(), true);
    }
}

