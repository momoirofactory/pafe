<?php
class UsersController extends AppController {

	var $name = 'Users';
	var $helpers = array('Html', 'Session', 'Javascript');
	var $uses = array('users', 'data');

	// 生徒登録
	public function index() {
		$results = $this->_unregist();

		//var_dump($results);
		$this->set('datas', $results);
	}


	// 生徒一覧
	public function lists() {
		$results = $this->_regist();

		//var_dump($results);
		$this->set('datas', $results);
	}

	// 未登録カード数API
	public function unregisted() {
		$this->autoRender = false;
		$this->layout = 'ajax';

		$results = $this->_unregist();
		echo count($results);
	}

	// 生徒数API
	public function total() {
		$this->autoRender = false;
		$this->layout = 'ajax';

		$conditions['status'] = 'active';
		$query['conditions'] = $conditions;
		$count = $this->users->find('count', $query);

		echo intval($count);
	}

        // バーコードリーダー状態取得
        public function status_barcodereader() {
                $this->autoRender = false;
                $this->layout = 'ajax';

                $res['status'] = 'btn-success';
                $res['message'] = '稼働中！';

                echo json_encode($res);
        }

        // カードリーダー状態取得
        public function status_cardreader() {
                $this->autoRender = false;
                $this->layout = 'ajax';

                $res['status'] = 'btn-success';
                $res['message'] = '稼働中？';

                echo json_encode($res);
        }

	// 未登録カード数
	private function _regist() {
		$unregist = array();

		// select * from data left join users 
		// on data.idm=users.idm group by data.idm,data.pmm;

		$query['table'] = 'users';
		$query['alias'] = 'Users';
		$query['type'] = 'left';
		$query['conditions'] = array('Users.idm = data.idm', 'Users.pmm = data.pmm');
		$options['joins'] = array($query);
		$options['fields'] = array('data.idm','data.pmm','data.codabar','Users.user');
		$options['group'] = array('idm', 'pmm');
		$results = $this->data->find('all', $options);

		// userが空のレコード数をカウント
		//print_r($results);
		foreach($results as $result) {
			if ($result['Users']['user'] != '') {
				$unregist[] = $result;
			}
		}

		return $unregist;
	}

	// 未登録カード数
	private function _unregist() {
		$unregist = array();

		// select * from data left join users 
		// on data.idm=users.idm group by data.idm,data.pmm;

		$query['table'] = 'users';
		$query['alias'] = 'Users';
		$query['type'] = 'left';
		$query['conditions'] = array('Users.idm = data.idm', 'Users.pmm = data.pmm');
		$options['joins'] = array($query);
		$options['fields'] = array('data.idm','data.pmm','data.codabar','Users.user');
		$options['group'] = array('idm', 'pmm');
		$results = $this->data->find('all', $options);

		// userが空のレコード数をカウント
		//print_r($results);
		foreach($results as $result) {
			if ($result['Users']['user'] == '') {
				$unregist[] = $result;
			}
		}
		return $unregist;
	}
}
