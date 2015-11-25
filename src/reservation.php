<?php

class Reservation {
	var $doc, $user, $date, $duration;
	function Reservation ($doc, $user, $date, $duration) {
		$this->doc = $doc;
		$this->user = $user;
		$this->date = $date;
		$this->duration = $duration;
	}

	function isExpired () {
		return ($this->date + $this->duration) < time();
	}
}