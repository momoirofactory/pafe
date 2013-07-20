<?php

require('Image/Barcode2.php');

// 画像作成API
class ImageController extends AppController {
	var $name = 'ibc2';
	var $uses = array();

	public function index() {
		$this->autoRender = false;

		$id = '';
		if (isset($_GET['id'])) {
			$id = h($_GET['id']);
		}

		header('Expires: Mon, 15 Jul 2013 00:00:00 GMT');
		header('Cache-Control: no-store, no-cache, must-revalidate');
		header('Cache-Control: post-check=0, pre-check=0', FALSE);
		header('Pragma: no-cache');
		header("Content-Type: image/x-png");

		$code = new Image_Barcode2();
		$code->draw($id, 'code128', 'png');
	}
}
