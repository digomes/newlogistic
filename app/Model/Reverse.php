<?php
App::uses('AppModel', 'Model');
/**
 * Reverse Model
 *
 * @property User $User
 * @property Status $Status
 * @property Cost $Cost
 * @property Product $Product
 * @property Upload $Upload
 */
class Reverse extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

	public $validate = array(
		'cost_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Por Favor selecione o centro de custos',
				//'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
            );
    
/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Status' => array(
			'className' => 'Status',
			'foreignKey' => 'status_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Cost' => array(
			'className' => 'Cost',
			'foreignKey' => 'cost_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Carrier' => array(
			'className' => 'Carrier',
			'foreignKey' => 'carrier_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
	);

        
	public $hasMany = array(
		'Upload' => array(
			'className' => 'Upload',
			'foreignKey' => 'reverse_id',
			'conditions' => ''
		),
		'ReversesProduct' => array(
			'className' => 'ReversesProduct',
			'foreignKey' => 'reverse_id',
			'conditions' => ''
		),
	);
/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Product' => array(
			'className' => 'Product',
			'joinTable' => 'reverses_products',
			'foreignKey' => 'reverse_id',
			'associationForeignKey' => 'product_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);
        
       
	public function createWithAttachments($data) {
		// Sanitize your images before adding them
		$uploads = array();
		if (!empty($data['Upload'][0])) {
			foreach ($data['Upload'] as $i => $upload) {
				if (is_array($data['Upload'][$i])) {
					// Force setting the `model` field to this model
					$upload['model'] = 'Upload';
					// Unset the foreign_key if the user tries to specify it
					if (isset($upload['reverse_id'])) {
						unset($upload['reverse_id']);
					}
					$uploads[] = $upload;
				}
			}
		}
		$data['Upload'] = $uploads;
		// Try to save the data using Model::saveAll()
		$this->create();
		if ($this->saveAll($data)) {
			return true;
                        return $this->redirect(array('action' => 'index'));
		}
		// Throw an exception for the controller
		throw new Exception(__("Não foi possível salvar sua solicitação, tente novamente."));
                Debugger::dump($this->request->data);
	}
        
        public function beforeSave($options = array()){
                foreach (array_keys($this->hasAndBelongsToMany) as $model){
                        if(isset($this->data[$this->name][$model])){
                                $this->data[$model][$model] = $this->data[$this->name][$model];
                                unset($this->data[$this->name][$model]);
                        }
                }
                return true;
        } 

}
