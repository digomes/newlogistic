<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {
    
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
        public $helpers = array('Csv');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		//$this->User->recursive = 0;
		//$this->set('users', $this->Paginator->paginate());
                    $this->paginate = array('limit' => '1000');
                    $users = $this->paginate('User');
                    $this->set(compact('users'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));

            $this->Userid = $id;
            $reverses = $this->User->Reverse->find('all', 
                    array(
                        'conditions' => array(
                            'Reverse.user_id' => $this->Userid
                        ),
                        'order' => array('Reverse.created' => 'ASC'),
                        'group' => array('Reverse.status_id'),
                        'fields' => array(
                            'Status.name',
                            'Count(Reverse.status_id) as Total',
                            'Reverse.status_id',
                        )
                    )
                    );
            
            $charts = new GoogleChart();
            
            $charts->type('PieChart');
            $charts->options(array('title' => 'Coletas Reversas', 'width' => '640', 'height' => '480'));
            $charts->columns(array(
                'status_id' => array(
                    'type' => 'string',
                    'label' => 'status_id'
                ),
                'Total' => array(
                    'type' => 'number',
                    'label' => 'Total'
                )
            )); 
            
            
            
           foreach($reverses as $row){
                    $charts->addRow(array('status_id' => $row['Status']['name'], 'Total' => $row['0']['Total']));
            }
           // $charts->addRow(array('condition_id' => 'Brazil', 'Total' => '1900'));

            $charts->div('chart_div');
             
            $total = $this->User->Reverse->find('all', 
                    array(
                        'conditions' => array(
                            'Reverse.user_id' => $this->Userid,
                        ),
                    )
                    );
                
                $this->set('user', $this->User->find('first', $options));
                $this->set(compact('charts', 'total'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
		$groups = $this->User->Group->find('list');
        $carriers = $this->User->Workshop->Carrier->find('list');
		$workshops = $this->User->Workshop->find('list');
		$this->set(compact('groups', 'workshops', 'carriers'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
                    
                    if(empty($this->request->data['User']['password'])){
                        unset($this->request->data['User']['password']);
                    }
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		$groups = $this->User->Group->find('list');
		$workshops = $this->User->Workshop->find('list');
        $carriers = $this->User->Workshop->Carrier->find('list');
		$this->set(compact('groups', 'workshops', 'carriers'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
        
        
        public function login(){
            if($this->request->is('post')){
                if($this->Auth->login()){
                    return $this->redirect($this->Auth->redirect());
                }
                $this->Session->setFlash(__('Seu usuário ou senha está incorreto, por favor tente novamente.'));
            }
            $this->layout = 'login';
        }
        
        public function logout(){
            $this->Session->setFlash('Obrigado por utilizar o nosso sistema.');
            $this->redirect($this->Auth->logout());
        }
        
        public function chartTicket($id = null){
            $this->Userid = $id;
            $reverses = $this->User->Reverse->find('all', 
                    array(
                        'conditions' => array(
                            'Reverse.user_id' => $this->Userid
                        ),
                        'order' => array('Reverse.created' => 'ASC'),
                        'group' => array('Reverse.status_id'),
                        'fields' => array(
                            'Status.name',
                            'Count(Reverse.status_id) as Total',
                            'Reverse.status_id',
                        )
                    )
                    );
            
            $charts = new GoogleChart();
            
            $charts->type('PieChart');
            $charts->options(array('title' => 'Coletas Reversas', 'width' => '640', 'height' => '480'));
            $charts->columns(array(
                'status_id' => array(
                    'type' => 'string',
                    'label' => 'status_id'
                ),
                'Total' => array(
                    'type' => 'number',
                    'label' => 'Total'
                )
            )); 
            
            
            
           foreach($reverses as $row){
                    $charts->addRow(array('status_id' => $row['Status']['name'], 'Total' => $row['0']['Total']));
            }
           // $charts->addRow(array('condition_id' => 'Brazil', 'Total' => '1900'));
            

           

            $charts->div('chart_div');
            $this->set(compact('charts', 'reverses'));
            //$this->layout = 'form';
        }

    public function exportPlan(){
        //$this->User->Reverse->recursive = 1;
        $reversesproducts = $this->User->Reverse->find('all');
        //$reverses = $this->ReversesProduct->Reverse->User->find('all');
        $_serialize = array('reversesproducts');
        $_delimiter = ';';
        $_header = array('Numero da Coleta', 'Numero NF Posto', 'Serie NF', 'Volume', 'Valor NF', 'Nome do Usuario', 'Nome do Posto', 'Status', 'Centro de Custo', 'Numero de SO', 'Data Solicitacao', 'Observacao', 'NF de Origem', 'Modelo', 'Descricao do Produto', 'Embalagem', 'Etiqueta');
        $_extract = array('Reverse.id', 'Reverse.invoice', 'Reverse.serie', 'Reverse.quantity', 'Reverse.amount', 'User.name', 'User.username', 'Reverse.Status', 'Cost.name', 'Reverse.so', 'Reverse.created', 'Reverse.observation', 'Reverse.reverse', 'Product.material', 'Product.description', 'ReversesProduct.embalagem', 'ReversesProduct.etiqueta');

        $this->viewClass = 'CsvView.Csv';
        //$this->set(compact('reversesproducts', '_serialize', '_header', '_extract', '_delimiter'));
        Debugger::dump($reversesproducts);
        //$this->Export->exportCsv($reverses, 'reverses'.date('Y-m-d H:i:s').'.csv');
    }





        
}
