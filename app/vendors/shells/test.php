<?php

class TestShell extends Shell {
	public $uses = array('devices');

	public function main() {

		//var_dump($this->devices->alldevices());

		var_dump($this->devices->scanner());
		var_dump($this->devices->reader());
		var_dump($this->devices->wifi());
		var_dump($this->devices->test());
	}

	function _welcome() {}
}

