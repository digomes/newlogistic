<?php
App::uses('AppController', 'Controller');
/**
 * Collections Controller
 *
 * @property Collection $Collection
 * @property PaginatorComponent $Paginator
 */
class CollectionsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'RequestHandler');
        public $helpers = array('Js');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Collection->recursive = 0;
		$this->set('collections', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Collection->exists($id)) {
			throw new NotFoundException(__('Invalid collection'));
		}
		$options = array('conditions' => array('Collection.' . $this->Collection->primaryKey => $id));
		$this->set('collection', $this->Collection->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */

	public function add() {
            
        $modelClass = 'Collection';
            if ($this->request->is('Post')) {
                $this->$modelClass->create();
                
                //$fixed = array('Part' => array('category_id' => $idCategory));
                $records_count = $this->$modelClass->find( 'count' );
                try {
                    $this->$modelClass->importCSV( $this->request->data[$modelClass]['CsvFile']['tmp_name']);
                    
                } catch (Exception $e) {
                    $import_errors = $this->$modelClass->getImportErrors();
                    $this->set( 'import_errors', $import_errors );
                    $this->Session->setFlash( __('Error Importing') . ' ' . $this->request->data[$modelClass]['CsvFile']['name'] . ', ' . __('column name mismatch.')  );
                    $this->redirect( array('action'=>'add') );
                    
                }
         
                $new_records_count = $this->$modelClass->find( 'count' ) - $records_count;
                $this->Session->setFlash(__('Successfully imported') . ' ' . $new_records_count .  ' records from ' . $this->request->data[$modelClass]['CsvFile']['name'] );
                $this->redirect( array('action'=>'index') );
            }
            $this->set('modelClass', $modelClass );
                
	}


/*	public function add() {
		if ($this->request->is('post')) {
			$this->Collection->create();
			if ($this->Collection->save($this->request->data)) {
				$this->Session->setFlash(__('The collection has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The collection could not be saved. Please, try again.'));
			}
		}
		//$users = $this->Collection->User->find('list');
		//$this->set(compact('users'));
	}
*/
/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Collection->exists($id)) {
			throw new NotFoundException(__('Invalid collection'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Collection->save($this->request->data)) {
				$this->Session->setFlash(__('The collection has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The collection could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Collection.' . $this->Collection->primaryKey => $id));
			$this->request->data = $this->Collection->find('first', $options);
		}
		$users = $this->Collection->User->find('list');
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Collection->id = $id;
		if (!$this->Collection->exists()) {
			throw new NotFoundException(__('Invalid collection'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Collection->delete()) {
			$this->Session->setFlash(__('The collection has been deleted.'));
		} else {
			$this->Session->setFlash(__('The collection could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

    public function validarNF($id = null){
        if ($this->request->is('ajax')) {

            $id = $this->request->data['id'];
            $postoID = $this->Session->read('Auth.User.Workshop.code');

            $collections = $this->Collection->find('all', 
                    array(
                        'conditions' => array(
                            'Collection.invoice' => $id,
                            'Collection.workshop' => $postoID,
                        ),
                        //'order' => array('Collection.created' => 'ASC'),
                       // 'limit' => '1'
                    )
            );

           foreach($collections as $row){

                echo ($row['Collection']['id']) ? 1 : 0;
                    
           }

          //$reverse = $this->set(compact('reverses')); 
          //return $reverse;

            //print_r($reverses);
        }
    }
}
