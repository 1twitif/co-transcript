<?php

require_once(dirname(__FILE__) . '/../src/reservation.php');

class TestReservation extends UnitTestCase {
    function testNewReservation() {
        $doc = $user = $date = $duration = 0;
    	$res = new Reservation($doc, $user, $date, $duration);
    	$this->assertIsA($res, 'Reservation');
    }

    function testIsExpired(){
        $doc = $user = 0;
        $date = time() - (7 * 24 * 60 * 60);
        $duration = 15 * 24 * 60 * 60;
        $res = new Reservation($doc, $user, $date, $duration);
        $this->assertFalse($res->isExpired());
    }

    function testIsNotExpired(){
        $doc = $user = $date = $duration = 0;
        $res = new Reservation($doc, $user, $date, $duration);
        $this->assertTrue($res->isExpired());
    }
}

