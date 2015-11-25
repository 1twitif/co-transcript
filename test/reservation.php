<?php

require_once(dirname(__FILE__) . '/../src/reservation.php');

class TestReservation extends UnitTestCase {
    function testNewReservation() {
        $doc = $author = $date = $duration = 0;
    	$res = new Reservation($doc, $author, $date, $duration);
    	$this->assertIsA($res, 'Reservation');
    }

    function testIsNotExpired(){
        $doc = $author = 0;
        $date = time() - (7 * 24 * 60 * 60);
        $duration = 15 * 24 * 60 * 60;
        $res = new Reservation($doc, $author, $date, $duration);
        $this->assertFalse($res->isExpired());
    }

    function testIsExpired(){
        $doc = $author = $date = $duration = 0;
        $res = new Reservation($doc, $author, $date, $duration);
        $this->assertTrue($res->isExpired());
    }

    function testFree(){
        $doc = $author = 0;
        $date = time() - (7 * 24 * 60 * 60);
        $duration = 15 * 24 * 60 * 60;
        $res = new Reservation($doc, $author, $date, $duration);
        $res->free();
        $this->assertTrue($res->isExpired());
    }

    function testGetAuthor(){
        $doc = $date = $duration = 0;
        $author = 'John Cena';
        $res = new Reservation($doc, $author, $date, $duration);
        $this->assertIdentical($res->getAuthor(), $author);
    }
}

