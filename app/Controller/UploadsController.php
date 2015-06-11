<?php
App::uses('AppController', 'Controller');
/**
 * Uploads Controller
 *
 * @property Upload $Upload
 * @property PaginatorComponent $Paginator
 */
class UploadsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Upload->recursive = 0;
		$this->set('uploads', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Upload->exists($id)) {
			throw new NotFoundException(__('Invalid upload'));
		}
		$options = array('conditions' => array('Upload.' . $this->Upload->primaryKey => $id));
		$this->set('upload', $this->Upload->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($id = null) {
            $this->Upload->Reverse->id = $id;
             $this->userId = $this->Session->read('Auth.User.id'); 
		if ($this->request->is('post')) {
			$this->Upload->create();
                         //$this->request->data['Reverse']['status_id'] = 11;
                        $this->request->data['Upload']['reverse_id'] = $this->Upload->Reverse->id;
			if ($this->Upload->saveAll($this->request->data)) {
                            
                            //$this->request->data['Upload']['reverse_id'] = $this->Upload->Reverse->getInsertID() + 1;  
                                //$this->Upload->set('reverse_id', $this->Upload->Reverse->id);
                                $this->Upload->Reverse->read(null, $this->Upload->Reverse->id);
                                $this->Upload->Reverse->set('status_id', 1);
                                $this->Upload->Reverse->set('modified', date('Y-m-d H:i:s'));
                                    if ($this->Upload->Reverse->save()) {
                                        $this->Session->setFlash(__('Correção enviada com sucesso.'));
                                        return $this->redirect(array('controller' => 'Reverses' ,'action' => 'view', $this->Upload->Reverse->id));
                                    }			                          

			} else {
				$this->Session->setFlash(__('Não foi possível processar sua solicitação, por favor tente novamente.'));
			}

		}
               // Debugger::dump($this->request->data);
		$types = $this->Upload->Type->find('list');
		$reverses = $this->Upload->Reverse->find('list',
                   array(
                            'conditions' => array(
                                'AND' => array(
                                    'Reverse.status_id =' => '12',
                                    'Reverse.user_id =' => $this->userId
                                )),
                             'fields' => array(
                                 'Reverse.id'
                             ),
                            ));
		$this->set(compact('types', 'reverses'));
	}
        

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Upload->exists($id)) {
			throw new NotFoundException(__('Invalid upload'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Upload->save($this->request->data)) {
				$this->Session->setFlash(__('The upload has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The upload could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Upload.' . $this->Upload->primaryKey => $id));
			$this->request->data = $this->Upload->find('first', $options);
		}
		$types = $this->Upload->Type->find('list');
		$reverses = $this->Upload->Reverse->find('list');
		$this->set(compact('types', 'reverses'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Upload->id = $id;
		if (!$this->Upload->exists()) {
			throw new NotFoundException(__('Invalid upload'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Upload->delete()) {
			$this->Session->setFlash(__('The upload has been deleted.'));
		} else {
			$this->Session->setFlash(__('The upload could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
        
        
        public function baixar($id = null){
           $this->Upload->id = $id;
           $baixar = $this->Upload->read(null, $id); 
            
            
            //debug($baixar);
            //print_r();  

            $ext = explode('.', $baixar['Upload']['filename']);

            $this->viewClass = 'Media';
            $params = array(
                'id' => $baixar['Upload']['filename'],
                'name' => $ext['0'],
                'download' => true,
                'extension' => $ext['1'],
                'mimeType' => $baixar['Upload']['mimetype'], 
                'path' => 'files'.DS.'upload'.DS.'filename'.DS.$baixar['Upload']['dir'].DS.''
            );
            $this->set($params); 
        }   
}
