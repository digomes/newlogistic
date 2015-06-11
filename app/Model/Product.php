<?php
App::uses('AppModel', 'Model');
/**
 * Product Model
 *
 * @property Category $Category
 * @property Reverse $Reverse
 */
class Product extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed
    public $hasMany = array(
		'ReversesProduct' => array(
			'className' => 'ReversesProduct',
			'foreignKey' => 'product_id',
			'conditions' => ''
		),
    );
/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Reverse' => array(
			'className' => 'Reverse',
			'joinTable' => 'reverses_products',
			'foreignKey' => 'product_id',
			'associationForeignKey' => 'reverse_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);

}
