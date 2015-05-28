<?php
App::uses('AppModel', 'Model');
/**
 * Status Model
 *
 * @property Reverse $Reverse
 */
class Status extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

    public $displayField = 'name';
    public $actsAs = array('Encoder');
/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Reverse' => array(
			'className' => 'Reverse',
			'foreignKey' => 'status_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
