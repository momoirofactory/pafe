<?php
class DataController extends AppController {

	var $name = 'Data';
	var $helpers = array('Html', 'Session');
	var $uses = array('data', 'users');

	public function index() {}

	public function regist() {
		$users = $this->users->activeusers();
		$this->set('users', $users);
		$this->set('time', time());
	}
}
