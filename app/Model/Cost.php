<?php
App::uses('AppModel', 'Model');
/**
 * Cost Model
 *
 * @property Reverse $Reverse
 */
class Cost extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

        public $actsAs = array('Encoder');
    
/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Reverse' => array(
			'className' => 'Reverse',
			'foreignKey' => 'cost_id',
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
