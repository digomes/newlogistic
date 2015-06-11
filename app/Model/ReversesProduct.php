<?php
App::uses('AppModel', 'Model');
/**
 * ReversesProduct Model
 *
 * @property Reverse $Reverse
 * @property Product $Product
 */
class ReversesProduct extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Reverse' => array(
			'className' => 'Reverse',
			'foreignKey' => 'reverse_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Product' => array(
			'className' => 'Product',
			'foreignKey' => 'product_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Cost' => array(
			'className' => 'Cost',
			'foreignKey' => '',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
	);
}
