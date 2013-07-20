<?php
class PafeController extends AppController {

	var $name = 'Pafe';
	var $helpers = array('Html', 'Session', 'Javascript');
	var $uses = array();

	public function index() {}

	// 日時取得API
	public function date() {
		$this->autoRender = false;
		$this->layout = 'ajax';

		echo $this->getdate();
	}

	// 日時取得API
	public function getdate() {

		$tz = date_default_timezone_get();
		date_default_timezone_set('Asia/Tokyo');

		$date = date('Y/n/j g:i A');

		date_default_timezone_set($tz);

		return $date;
	}

	// 日時更新API
	public function setdate($date) {
		//exec('date -s "02/08 14:11 2003"');
	}

	// felica ポーリング確認
	public function check_pasori() {
		
	}


	// バーコードスキャナポーリング確認
	public function check_scaner() {
		
	}
}
