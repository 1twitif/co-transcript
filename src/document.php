<?php

class Document {
	var $files = [];
	function addFile ($fileString) {
			$this->files[] = $fileString;
	}

	function getScan () {
		return $this->files[0];
	}

	function getLastVersion () {
		return $this->files[sizeof($this->files)-1];
	}

	function addReservation ($Reservation) {

	}

	function isReserved () {
		 #return True;
	}
}