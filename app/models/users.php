<?php
class users extends AppModel {
	var $useTable = 'users';

	public function activeUsers() {
		$conditions['status'] = 'active';
		$query['conditions'] = $conditions;
		$this->find('all', $query);
	}

}
