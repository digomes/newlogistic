<?php
App::uses('AppModel', 'Model');
/**
 * Upload Model
 *
 * @property Type $Type
 * @property Reverse $Reverse
 */
class Upload extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

    public $actsAs = array(
        'Upload.Upload' => array(
            'filename' => array(
                'fields' => array(
                    'dir' => 'dir',
                    'type' => 'mimetype',
                    'size' => 'filesize'
                ),
            )
        )
    );
    
/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Type' => array(
			'className' => 'Type',
			'foreignKey' => 'type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
                'Reverse' => array(
                    'className' => 'Reverse',
                    'foreingKey' => 'reverse_id',
                    'conditions' => '',
                    'fields' => '',
                    'order' => ''
                )
	);




}
