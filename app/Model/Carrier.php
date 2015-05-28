<?php
App::uses('AppModel', 'Model');
/**
 * Carrier Model
 *
 */
class Carrier extends AppModel {

    public $hasMany = array(

        'Workshop' => array(
            'className' => 'Workshop',
            'foreignKey' => 'carrier_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
        'Reverse' => array(
            'className' => 'Reverse',
            'foreignKey' => 'carrier_id',
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
