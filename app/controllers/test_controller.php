<?php

class TestController extends AppController {

	var $uses = array();
	
	// page dimension
	// landscape 1p 3x3
	// h 297mm margin12mm:91mm*3:margin12mm
	// v 210mm margin12mm:60mm*3:margin18mm

	var $margin_top = 12.0;
	var $margin_bottom = 18.0;
	var $margin_left = 12.0;
	var $margin_right = 12.0;

	var $margin = 3.0;

	var $page_width = 297.0;
	var $page_height = 210.0;

	// item size.
	var $item_width = 91.0;
	var $item_height = 60.0;

	var $num_x = 3;
	var $num_y = 3;

	public function index() { }

	//
	public function barcode() {

		$user = 'A100101B';
		// for html (render from views.)
		//$url = Router::url('/') . 'ibc2/image?id='.$user.'&ext=.png';
		//$pdf->Image($url);
	}

	// 
	public function pdf() {

		$this->autoRender = false;

		require(APP.'libs/fpdf/epdf.php');
		require('Image/Barcode2.php');

		$pdf = new EPDF('L', 'mm', 'A4');

		$pdf->SetAuthor('pdf_author');
		$pdf->SetCreator('pdf_ceator');
		$pdf->SetKeywords('pdf_keywords');
		$pdf->SetSubject('pdf_subject');
		$pdf->SetTitle('pdf_title');

		$pdf->SetLineWidth(0.01);

		//$users = $this->users->activeUsers();
		$users = array('A010001B', 'A010002C');

		$index = 0;
		foreach ($users as $user) {

			if (($index % ($this->num_x * $this->num_y)) == 0) {
				$pdf->AddPage();
				$this->tombo($pdf);
			}

			$item_x = $index % $this->num_x;
			$item_y = $index / $this->num_y;
			$item_origin_x = $this->margin_left + $item_x * $this->item_width;
			$item_origin_y = $this->margin_top + $item_y * $this->item_height;

			// title
			$pdf->setX($item_origin_x + 20.0);
			$pdf->setY($item_origin_y + 20.0);

			// image (m/f)
			$pdf->setX($item_origin_x + 20.0);
			$pdf->setY($item_origin_y + 20.0);

			// name
			$pdf->setX($item_origin_x + 20.0);
			$pdf->setY($item_origin_y + 20.0);

			// | || |
			$pdf->setX($item_origin_x + 20.0);
			$pdf->setY($item_origin_y + 20.0);

	//		$code = new Image_Barcode2();
	//		$code->draw($user, 'code128', 'png');

			$index++;
		}

		$pdf->Close('user.pdf', 'D');
		$pdf->Output();
		unset($pdf);
	}

	private function users() {
		
	}

	private function tombo($pdf) {

		$margin = $this->margin;
		$page_h = $this->page_height;
		$page_w = $this->page_width;
		$item_h = $this->item_height;
		$item_w = $this->item_width;

		$top = $this->margin_top;
		$bottom = $page_h - $this->margin_bottom;
		$left = $this->margin_left;
		$right = $page_w - $this->margin_right;

		$pdf->SetMargins($this->margin_left, $this->margin_top, $this->margin_right);

		// top_left
		$pdf->L($left, $margin, $margin, $top - $margin);
		$pdf->L($left - $margin, $margin, $margin, $top);
		
		// top_right
		$pdf->L($right, $margin, $page_w - $margin, $top - $margin);
		$pdf->L($right + $margin, $margin, $page_w - $margin, $top);

		// bottom_right
		$pdf->L($right, $page_h - $margin, $page_w - $margin, $bottom + $margin);
		$pdf->L($right + $margin, $page_h - $margin, $page_w - $margin, $bottom);
		
		// bottom_left
		$pdf->L($left, $page_h - $margin, $margin, $bottom + $margin);
		$pdf->L($left - $margin, $page_h - $margin, $margin, $bottom);

		$pdf->V($left + $item_w, $margin, $top - $margin);
		$pdf->V($left + $item_w + $item_w, $margin, $top - $margin);
		$pdf->V($left + $item_w, $bottom + $margin, $page_h - $margin);
		$pdf->V($left + $item_w + $item_w, $bottom + $margin, $page_h - $margin);

		$pdf->H($top + $item_h, $margin, $left - $margin);
		$pdf->H($top + $item_h + $item_h, $margin, $left - $margin);
		$pdf->H($top + $item_h, $right + $margin, $page_w - $margin);
		$pdf->H($top + $item_h + $item_h, $right + $margin, $page_w - $margin);
	}
}
