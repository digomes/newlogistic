<?php
App::uses('AppController', 'Controller');
/**
 * ReversesProducts Controller
 *
 * @property ReversesProduct $ReversesProduct
 * @property PaginatorComponent $Paginator
 */
class ReversesProductsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	//public $components = array('Paginator');
        
        public $components = array(
            'RequestHandler' => array(
                'viewClassMap' => array('csv' => 'CsvView.Csv')
            ),
            'Paginator'
        );

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ReversesProduct->recursive = 0;
		$this->set('reversesProducts', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ReversesProduct->exists($id)) {
			throw new NotFoundException(__('Invalid reverses product'));
		}
		$options = array('conditions' => array('ReversesProduct.' . $this->ReversesProduct->primaryKey => $id));
		$this->set('reversesProduct', $this->ReversesProduct->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ReversesProduct->create();
			if ($this->ReversesProduct->save($this->request->data)) {
				$this->Session->setFlash(__('The reverses product has been saved.'));
				//return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The reverses product could not be saved. Please, try again.'));
			}
		}
		$reverses = $this->ReversesProduct->Reverse->find('list');
		$products = $this->ReversesProduct->Product->find('list');
		$this->set(compact('reverses', 'products'));
                //Debugger::dump($this->request->data);
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->ReversesProduct->exists($id)) {
			throw new NotFoundException(__('Invalid reverses product'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ReversesProduct->save($this->request->data)) {
				$this->Session->setFlash(__('The reverses product has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The reverses product could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ReversesProduct.' . $this->ReversesProduct->primaryKey => $id));
			$this->request->data = $this->ReversesProduct->find('first', $options);
		}
		$reverses = $this->ReversesProduct->Reverse->find('list');
		$products = $this->ReversesProduct->Product->find('list');
		$this->set(compact('reverses', 'products'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->ReversesProduct->id = $id;
		if (!$this->ReversesProduct->exists()) {
			throw new NotFoundException(__('Invalid reverses product'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->ReversesProduct->delete()) {
			$this->Session->setFlash(__('The reverses product has been deleted.'));
		} else {
			$this->Session->setFlash(__('The reverses product could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
        
        public function export(){

                $reversesproducts = $this->ReversesProduct->find('all');
                $_serialize = 'reversesproducts';
                $_delimiter = ';';
                $_header = array('Numero da Coleta', 'Modelo', 'Descricao do Produto', 'Embalagem');
                $_extract = array('ReversesProduct.reverse_id', 'Product.material', 'Product.description', 'ReversesProduct.embalagem');

                $this->viewClass = 'CsvView.Csv';
                $this->set(compact('reversesproducts', '_serialize', '_header', '_extract', '_delimiter'));

		//$this->Export->exportCsv($reverses, 'reverses'.date('Y-m-d H:i:s').'.csv');
        }

	public function report(){
		$statuses = $this->ReversesProduct->Reverse->Status->find('list');
		$this->set(compact('statuses'));
	}

	public function exportPlan(){
		//$this->ReversesProduct->recursive = 1;
		//$reversesproducts = $this->ReversesProduct->find('all', array());

		$statusColeta = $this->request->data['ReversesProduct']['status_id'];
		$dataDe = $this->request->data['ReversesProduct']['from'];
		$dataAte = $this->request->data['ReversesProduct']['to'];

		if($statusColeta == ""){

		$reversesproducts = $this->ReversesProduct->find('all', array(
			'conditions' => array(
					//'Reverse.status_id' => $statusColeta,
					'Reverse.created BETWEEN ? AND ? ' => array($dataDe, $dataAte),
			),
			'recursive' => 1,
			'limit' => '4000'
			)
		);

		}else{

		$reversesproducts = $this->ReversesProduct->find('all', array(
			'conditions' => array(
					'Reverse.status_id' => $statusColeta,
					'Reverse.created BETWEEN ? AND ? ' => array($dataDe, $dataAte),
                                        //'Reverse.created BETWEEN $dataDe AND $dataAte,
			),
			'recursive' => 1,
			'limit' => '4000'
			)
		);

		}
		//$reversesproducts = $this->paginate('Reverse');
		//$reverses = $this->ReversesProduct->Reverse->User->find('all');

		$_serialize = array('reversesproducts');
		$_delimiter = ';';
		$_header = array('Numero da Coleta', 'Numero NF Posto', 'Serie NF', 'Volume', 'Valor NF', 'Nome do Usuario', 'Nome do Posto', 'Status', 'Centro de Custo', 'Numero de SO', 'Data Solicitacao', 'Data Aprovacao', 'Observacao', 'NF de Origem', 'Modelo', 'Descricao do Produto', 'Embalagem', 'Etiqueta', 'NF Origem');
		$_extract = array('Reverse.id', 'Reverse.invoice', 'Reverse.serie', 'Reverse.quantity', 'Reverse.amount', 'User.name', 'User.username', 'Reverse.status_id', 'Cost.name', 'Reverse.so', 'Reverse.created', 'Reverse.modified', 'Reverse.observation', 'Reverse.reverse', 'Product.material', 'Product.description', 'ReversesProduct.embalagem', 'ReversesProduct.etiqueta', 'ReversesProduct.invoice');

		$this->viewClass = 'CsvView.Csv';
		$this->set(compact('reversesproducts', '_serialize', '_header', '_extract', '_delimiter'));

		//Debugger::dump($reversesproducts);
		//$this->Export->exportCsv($reversesproducts, 'reverses'.date('Y-m-d H:i:s').'.csv');
	}

}
