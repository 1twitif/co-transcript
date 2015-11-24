<?php

require_once(dirname(__FILE__) . '/../src/reservation.php');

class TestReservation extends UnitTestCase {
    function testNewReservation() {
        $doc = $user = $date = $duration = 0;
    	$res = new Reservation($doc, $user, $date, $duration);
    	$this->assertIsA($res, 'Reservation');
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

}

