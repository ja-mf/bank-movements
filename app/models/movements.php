<?php
class Movement extends AppModel {
	var $name = 'Movement';
	var $validate = array(
		'reason' => array(
			'rule' => 'notEmpty'
		),
		'amount' => array(
			'rule' => 'notEmpty'
		),
		'mwhen' => array(
			'rule' => 'notEmpty'
		),
		'what' => array(
			'rule' => 'notEmpty'
		)
	);
}
?>
