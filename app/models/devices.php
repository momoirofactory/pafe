<?php
class Devices extends AppModel {
    var $useTable = 'devices';
    var $primaryKey = 'id';

	public $results;

	public function alldevices() {
		return $this->results;
	}

    public function scanner() {
        $found = 0;
		$results = $this->findall('scanner');
        foreach ($results as $result) {
			$dev = $result['Devices'];
            $found += $this->search_usb($dev['vid'], $dev['pid']) ? 1: 0;
        }
        return $found;
    }

    public function reader() {
        $found = 0;
		$results = $this->findall('reader');
        foreach ($results as $result) {
			$dev = $result['Devices'];
            $found += $this->search_usb($dev['vid'], $dev['pid']) ? 1: 0;
        }
        return $found;
    }

    public function wifi() {
        $found = 0;
		$results = $this->findall('wifi');
        foreach ($results as $result) {
			$dev = $result['Devices'];
            $found += $this->search_usb($dev['vid'], $dev['pid']) ? 1: 0;
        }
        return $found;
    }

    public function test() {
        $found = 0;
		$results = $this->findall('test');
        foreach ($results as $result) {
			$dev = $result['Devices'];
            $found += $this->search_usb($dev['vid'], $dev['pid']) ? 1: 0;
        }
        return $found;
    }

    private function findall($type = '') {
		$query['conditions'] = array('type' => $type);
		return $this->find('all', $query);
    }

    function __construct() {
		parent::__construct();
        $this->results = explode(PHP_EOL, rtrim(shell_exec('lsusb')));
    }

    // usbデバイスが接続されているか調べる
    public function search_usb($vid, $pid) {
        $bus_device = false;
        if ($this->results) {
            foreach ($this->results as $result) {
                $lines = explode(' ', $result);
                list($v, $p) = explode(':', $lines[5]);
                if ($v == $vid && $p == $pid) {
                    $bus_device = $lines[1] . rtrim($lines[3], ':');
                }
            }
        }
        return $bus_device;
    }
}
