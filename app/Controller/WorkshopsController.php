<?php
App::uses('AppController', 'Controller');
/**
 * Workshops Controller
 *
 * @property Workshop $Workshop
 * @property PaginatorComponent $Paginator
 */
class WorkshopsController extends AppController {

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
		//$this->Workshop->recursive = 0;
		//$this->set('workshops', $this->Paginator->paginate());
                    $this->paginate = array('limit' => '1000');
                    $workshops = $this->paginate('Workshop');
                    $this->set(compact('workshops'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Workshop->exists($id)) {
			throw new NotFoundException(__('Invalid workshop'));
		}
		$options = array('conditions' => array('Workshop.' . $this->Workshop->primaryKey => $id));
		$this->set('workshop', $this->Workshop->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Workshop->create();
			if ($this->Workshop->save($this->request->data)) {
				$this->Session->setFlash(__('The workshop has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The workshop could not be saved. Please, try again.'));
			}
		}
		$carriers = $this->Workshop->Carrier->find('list');
		$this->set(compact('carriers'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Workshop->exists($id)) {
			throw new NotFoundException(__('Invalid workshop'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Workshop->save($this->request->data)) {
				$this->Session->setFlash(__('The workshop has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The workshop could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Workshop.' . $this->Workshop->primaryKey => $id));
			$this->request->data = $this->Workshop->find('first', $options);
		}
		$carriers = $this->Workshop->Carrier->find('list');
		$this->set(compact('carriers'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Workshop->id = $id;
		if (!$this->Workshop->exists()) {
			throw new NotFoundException(__('Invalid workshop'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Workshop->delete()) {
			$this->Session->setFlash(__('The workshop has been deleted.'));
		} else {
			$this->Session->setFlash(__('The workshop could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

}
