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
    	$this->assertIdentical($doc->getScan(), 'monscan.jpg');
    }

    function testGetLastVersion() {
    	$doc = new Document;
    	$doc->addFile('monscan.jpg');
    	$doc->addFile('monFichier.jpg');
    	$this->assertIdentical($doc->getLastVersion(), 'monFichier.jpg');
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
    
    function testGetFinished() {
    	$doc = new Document;
    	$this->assertFalse($doc->isFinished());
    }

    function testSetFinished() {
    	$doc = new Document;
    	$doc->setFinished();
    	$this->assertTrue($doc->isFinished());
    }

    function testCountVersions() {
    	$doc = new Document;
    	$doc->addFile('scan.jpg');
    	$doc->addFile('transcriptionBrute.txt');
    	$doc->addFile('transcriptionMiseEnPage.md');
    	$this->assertIdentical($doc->countVersions(), 3);
    }

    function testGetTitle() {
    	$doc = new Document;
    	$doc->addTitle('nom random');
    	$doc->addTitle('nom corrigé');
    	$this->assertIdentical($doc->getTitle(), 'nom corrigé');
    }

    function testGetOriginalTitle() {
    	$doc = new Document;
    	$doc->addTitle('nom random');
    	$doc->addTitle('nom corrigé');
    	$this->assertIdentical($doc->getOriginalTitle(), 'nom random');
    }

    function testSerialization(){
        $doc = new Document;
        $doc->addReservation(new MockReservationStillActive);
        $doc->addReservation(new MockReservationExpired);
        $serialized = serialize($doc);
        $restoredDoc = unserialize($serialized);
        $this->assertTrue($restoredDoc->isReserved());
    }
}

