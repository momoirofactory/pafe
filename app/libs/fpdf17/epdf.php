<?php
include_once('fpdf.php');

class EPDF extends FPDF {

	// L angle line.
	public function L($x1, $y1, $x2, $y2) {
		$this->Line($x1, $y1, $x1, $y2);
		$this->Line($x1, $y2, $x2, $y2);
	}

	// Vertical line.
	public function V($x, $y1, $y2) {
		$this->Line($x, $y1, $x, $y2);
	}

	// Horizontal line.
	public function H($y, $x1, $x2) {
		$this->Line($x1, $y, $x2, $y);
	}

}
