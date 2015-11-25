<?php

class Reservation {
	var $doc, $author, $date, $duration, $finished;
	function Reservation ($doc, $author, $date, $duration) {
		$this->doc = $doc;
		$this->author = $author;
		$this->date = $date;
		$this->duration = $duration;
		$this->finished = false;
	}

	function isExpired () {
		return ($this->date + $this->duration) < time() || ($this->finished == True);
	}

	function free() {
		$this->finished = True;
	}

	function getAuthor() {
		return $this->author;
	}

}