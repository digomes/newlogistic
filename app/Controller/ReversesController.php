<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
/**
 * Reverses Controller
 *
 * @property Reverse $Reverse
 * @property PaginatorComponent $Paginator
 */
class ReversesController extends AppController {

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

        
        public function search(){
            if($this->request->is('post')){
                $idColeta = $this->request->data['Reverse']['coleta'];
                if (!$this->Reverse->exists($idColeta)) {
                    $this->Session->setFlash(__('Esse numero de coleta é inválido, por favor digite outro.'));
                    $this->redirect(array('controller' => 'reverses' ,'action' => 'search'));
			//throw new NotFoundException(__('Invalid reverse'));
                }else{
                    $dadosReversa = $this->Reverse->read(null, $idColeta);
                    $userId =  $dadosReversa['Reverse']['user_id'];
                    $this->userId = $this->Session->read('Auth.User.id');
                    $this->roleId = $this->Session->read('Auth.User.group_id'); 
                    
                    if($this->roleId == 1 OR $this->roleId == 2){
                       $this->redirect(array('controller' => 'reverses' ,'action' => 'view', $idColeta)); 
                    }else{    
                        if($userId == $this->userId){
                            $this->redirect(array('controller' => 'reverses' ,'action' => 'view', $idColeta));
                        }else{
                            $this->Session->setFlash(__('Esse numero de coleta é inválido, por favor digite o numero correto.'));
                        }
                    }    
                    }
                }
                $statuses = $this->Reverse->Status->find('list');
                //$workshops = $this->Reverse->User->Workshop->find('list');
                $this->set(compact('statuses'));
            }
            
/**
 * index method
 *
 * @return void
 */
        
	public function index() {
            
                $this->roleId = $this->Session->read('Auth.User.group_id'); 
                $this->userId = $this->Session->read('Auth.User.id');
                $this->carrieruserId = $this->Session->read('Auth.User.carrier_id');  
                $statusColeta = $this->request->data['Reverse']['status_id'];
                $userColeta = $this->request->data['Reverse']['user'];
                $dataDe = $this->request->data['Reverse']['from'];
                $dataAte = $this->request->data['Reverse']['to'];
                $statusID = $this->request->query['status_id'];
                $userID = $this->request->query['user'];

    if($this->roleId == '1'){

                $dadosReversa = $this->Reverse->User->findAllByEmailOrUsername(NULL, $userColeta);
                $userId =  $dadosReversa[0]['User']['id'];
                    
        if($userId == NULL AND $statusColeta == NULL){       
                  
                $this->paginate = array(
                    'conditions' => array(
                                'OR' => array(
                                    'Reverse.created BETWEEN ? AND ? ' => array($dataDe, $dataAte),   
                                )
                        ),
                    'limit' => '1000'
                ); 

                $reverses = $this->paginate('Reverse');
                $this->set(compact('reverses'));
                
        }else if($userId != NULL AND $statusColeta == NULL){
                   
                $this->paginate = array(
                    'conditions' => array(
                                'AND' => array(
                                    'Reverse.user_id' => $userId,
                                ),
                                'OR' => array(
                                    'Reverse.created BETWEEN ? AND ? ' => array($dataDe, $dataAte),  
                                )
                    ),
                    'limit' => '1000'
                );

                $reverses = $this->paginate('Reverse');
                $this->set(compact('reverses'));
                    
        }else if($userId != NULL AND $statusColeta != NULL){
                  
               $reverses = $this->paginate = array(
                    'conditions' => array(
                                'AND' => array(
                                    'Reverse.status_id' => $statusColeta,
                                    'Reverse.user_id' => $userId,
                                ),
                                'OR' => array(
                                    'Reverse.created BETWEEN ? AND ? ' => array($dataDe, $dataAte),  
                                )
                    ),
                    'limit' => '1000'
                ); 

                $reverses = $this->paginate('Reverse');
                $this->set(compact('reverses'));

        }else if($userID == NULL  AND $statusID != NULL){

        //$statusColeta
        //$userId
            
        App::uses('Sanitize', 'Utility');
        $status_id = Sanitize::clean($this->request->query['status_id'], array('encode' => false));
        $from = Sanitize::clean($this->request->query['from'], array('encode' => false));
        $to = Sanitize::clean($this->request->query['to'], array('encode' => false));
        print_r($status_id);
               $this->paginate = array(
                    'conditions' => array(
                       'AND' => array(
                                'AND' => array(
                                    'Reverse.status_id' => $status_id,
                                    //'Reverse.user_id' => $userId,
                                    
                                ),
                                'OR' => array(
                                    
                                    'Reverse.created BETWEEN ? AND ? ' => array($from, $to),
                                       
                                )
                            )
                        ),
                    'limit' => '10'
                ); 

                    $reverses = $this->paginate('Reverse');
                    $this->set(compact('status_id','reverses', 'from', 'to'));
                   Debugger::dump($reverses);
              /*  $reverses = $this->Reverse->find('all', array(
                    'conditions' => array(
                            'AND' => array(
                                    'Reverse.status_id' => $statusColeta,
                                    'Reverse.user_id' => $userId, 
                            ),
                            'OR' => array(
                                 'Reverse.created BETWEEN ? AND ? ' => array($dataDe, $dataAte),
                            )
                    ),
                    //'limit' => '1000'
                )
                );

                $this->set('reverses', $this->Paginator->paginate());
            */
                    
        }
    }else if($this->roleId == '3'){
                
                $this->paginate = array(
                    'conditions' => array(
                        'OR' => array(
                                'AND' => array(
                                    'Status.visibility_groups' => '',
                                    'Status.visibility_groups LIKE' => '%"' . $this->roleId . '"%',
                                ),
                                'AND' => array(
                                    'Reverse.user_id' => $this->userId,
                                )
                            )
                        ),
                    'limit' => '1000'
                );

                $reverses = $this->paginate('Reverse');
                $this->set(compact('reverses'));


    }else if($this->roleId == '2'){
                    
                $this->paginate = array(
                    'conditions' => array(
                        'AND' => array(
                            'AND' => array(
                               'Reverse.status_id' => $statusColeta, 
                            ),
                        'OR' => array(
                            'Status.visibility_groups' => '',
                            'Status.visibility_groups LIKE' => '%"' . $this->roleId . '"%',
                            )
                        )
                        ),
                    'limit' => '1000'
                );

                $reverses = $this->paginate('Reverse');
                $this->set(compact('reverses'));

    }else if($this->roleId == '4'){

                $this->Reverse->recursive = 1;   
                $reverses = $this->Reverse->find('all', array(
                    'conditions' => array(
                        'AND' => array(
                            'AND' => array(
                                'Reverse.status_id' => $statusColeta, 
                            ),
                            'OR' => array(
                                'Reverse.status_id' => '10', 
                                'Status.visibility_groups LIKE' => '%"' . $this->roleId . '"%',
                                'Reverse.carrier_id =' => $this->carrieruserId
                            )
                        )
                    ),
                    'limit' => '1000'
                )
                );
                    $this->set(compact('reverses'));
                    //   Debugger::dump($reverses);
    }    
}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Reverse->exists($id)) {
			throw new NotFoundException(__('Invalid reverse'));
		}
		$options = array('conditions' => array('Reverse.' . $this->Reverse->primaryKey => $id));
		$this->set('reverse', $this->Reverse->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
        
	public function add() {
		if ($this->request->is('post')) {
                        if ($this->request->data['ReversesProduct']['0'] == '') {
                            $this->Session->setFlash(__('É necessário selecionar ao menos um produto para coleta'));   
                            $this->redirect($this->referer());
                        }
                            //$this->roleId = $this->Session->read('Auth.User.group_id');
			try {
                                $this->request->data['Reverse']['user_id'] = $this->Auth->user('id');
                                $this->request->data['Reverse']['carrier_id'] = $this->Auth->user('Workshop.carrier_id');
				//$this->Reverse->createWithAttachments($this->request->data);
                                $this->Reverse->saveAll($this->request->data);
				$this->Session->setFlash(__('Nota Fiscal enviada para aprovação do Departamento Fiscal ! Coleta Numero #'.$this->Reverse->getLastInsertID()));
                                $this->Session->delete('Cart');
                                $this->Session->delete('Counter');
                                return $this->redirect(array('controller' => 'Reverses' ,'action' => 'search'));
			} catch (Exception $e) {
				$this->Session->setFlash($e->getMessage());
			}
		}
		$statuses = $this->Reverse->Status->find('list');
		$costs = $this->Reverse->Cost->find('list');
        $types = $this->Reverse->Upload->Type->find('list');
		//$uploads = $this->Reverse->Upload->find('list');
		$this->set(compact('costs', 'types', 'statuses'));
               // Debugger::dump($this->request->data);
               // $this->Session->delete('Cart');
               // $this->Session->delete('Counter');
	}
        

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Reverse->exists($id)) {
			throw new NotFoundException(__('Invalid reverse'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Reverse->save($this->request->data)) {
				$this->Session->setFlash(__('The reverse has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The reverse could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Reverse.' . $this->Reverse->primaryKey => $id));
			$this->request->data = $this->Reverse->find('first', $options);
		}
		$statuses = $this->Reverse->Status->find('list');
		$costs = $this->Reverse->Cost->find('list');
		$uploads = $this->Reverse->Upload->find('list');
                $types = $this->Reverse->Upload->Type->find('list');
		$this->set(compact('statuses', 'costs', 'uploads', 'types'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Reverse->id = $id;
		if (!$this->Reverse->exists()) {
			throw new NotFoundException(__('Invalid reverse'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Reverse->delete()) {
			$this->Session->setFlash(__('The reverse has been deleted.'));
		} else {
			$this->Session->setFlash(__('The reverse could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
        
    /**
     * use beforeRender to send session parameters to the layout view
     */
    public function beforeRender() {
        parent::beforeRender();
        $params = $this->Session->read('form.params');
        $this->set('params', $params);
    }
 
    /**
     * delete session values when going back to index
     * you may want to keep the session alive instead
     */
    public function msf_index() {
        $this->Session->delete('form');
    }
 
    /**
     * this method is executed before starting the form and retrieves one important parameter:
     * the form steps number
     * you can hardcode it, but in this example we are getting it by counting the number of files that start with msf_step_
     */
    public function msf_setup() {
        App::uses('Folder', 'Utility');
        $reversesViewFolder = new Folder(APP.'View'.DS.'Reverses');
        $steps = count($reversesViewFolder->find('msf_step_.*\.ctp'));
        $this->Session->write('form.params.steps', $steps);
        $this->Session->write('form.params.maxProgress', 0);
        $this->redirect(array('action' => 'msf_step', 1));
    }
 
    /**
     * this is the core step handling method
     * it gets passed the desired step number, performs some checks to prevent smart users skipping steps
     * checks fields validation, and when succeding, it saves the array in a session, merging with previous results
     * if we are at last step, data is saved
     * when no form data is submitted (not a POST request) it sets this->request->data to the values stored in session
     */
    public function msf_step($stepNumber) {
		$statuses = $this->Reverse->Status->find('list');
		$costs = $this->Reverse->Cost->find('list');
                $types = $this->Reverse->Upload->Type->find('list');
		//$uploads = $this->Reverse->Upload->find('list');
		$this->set(compact('costs', 'types', 'statuses'));
                Debugger::dump($this->Session->read('form'));
        /**
         * check if a view file for this step exists, otherwise redirect to index
         */
        if (!file_exists(APP.'View'.DS.'Reverses'.DS.'msf_step_'.$stepNumber.'.ctp')) {
            $this->redirect('/reverses/msf_index');
        }
 
        /**
         * determines the max allowed step (the last completed + 1)
         * if choosen step is not allowed (URL manually changed) the user gets redirected
         * otherwise we store the current step value in the session
         */
        $maxAllowed = $this->Session->read('form.params.maxProgress') + 1;
        if ($stepNumber > $maxAllowed) {
            $this->redirect('/reverses/msf_step/'.$maxAllowed);
        } else {
            $this->Session->write('form.params.currentStep', $stepNumber);
        }
 
        /**
         * check if some data has been submitted via POST
         * if not, sets the current data to the session data, to automatically populate previously saved fields
         */
        if ($this->request->is('post')) {
 
            /**
             * set passed data to the model, so we can validate against it without saving
             */
            $this->Reverse->set($this->request->data);
 
            /**
             * if data validates we merge previous session data with submitted data, using CakePHP powerful Hash class (previously called Set)
             */

                $prevSessionData = $this->Session->read('form');
                $currentSessionData = Hash::merge( (array) $prevSessionData, $this->request->data);
 
                /**
                 * if this is not the last step we replace session data with the new merged array
                 * update the max progress value and redirect to the next step
                 */
                if ($stepNumber < $this->Session->read('form.params.steps')) {
                    $this->Session->write('form', $currentSessionData);
                    $this->Session->write('form.params.maxProgress', $stepNumber);
                    $this->redirect(array('action' => 'msf_step', $stepNumber+1));
                } else {
                    /**
                     * otherwise, this is the final step, so we have to save the data to the database
                     */
                    $this->Reverse->save($currentSessionData);
                    $this->Session->setFlash('Coleta cadastrada com sucesso!');
                    //$this->redirect('/reverses/msf_index');
                }
            }

 
        /**
         * here we load the proper view file, depending on the stepNumber variable passed via GET
         */
        $this->render('msf_step_'.$stepNumber);
        

    }
    
    public function correct($id = null){
		$this->Reverse->id = $id;
                if ($this->request->is('post')) {
		if (!$this->Reverse->exists()) {
			throw new NotFoundException(__('Invalid ticket'));
		}
		$this->request->onlyAllow('post');
                //$data = array('id' => $this->Ticket->id, 'condition_id' => '2');
                if($this->request->data['Reverse']['observation']== ''){
                    $this->Session->setFlash(__('Digite uma observação para o posto corrigir a coleta'));
                }else{
                $this->Reverse->read(null, $this->Ticket->id);
                $this->Reverse->set('status_id', 12);
                $this->Reverse->set('observation', $this->request->data['Reverse']['observation']);
                $this->Reverse->set('modified', date('Y-m-d H:i:s'));
		if ($this->Reverse->save()) {
			$this->Session->setFlash(__('Solicitação de correção enviada com sucesso'));
                        $this->redirect(array('action' => 'index'));
			//$this->redirect(array('action' => 'view', $this->Ticket->id));
		}
		$this->Session->setFlash(__('Não foi possível atender sua solicitação'));
		$this->redirect(array('action' => 'index'));
                }
                
                }
    }
    
    public function disapprove($id = null){
		$this->Reverse->id = $id;
                if ($this->request->is('post')) {
		if (!$this->Reverse->exists()) {
			throw new NotFoundException(__('Invalid ticket'));
		}
		$this->request->onlyAllow('post');
                //$data = array('id' => $this->Ticket->id, 'condition_id' => '2');
                if($this->request->data['Reverse']['observation']== ''){
                    $this->Session->setFlash(__('Digite uma observação para reprovar a coleta'));
                }else{
                $this->Reverse->read(null, $this->Ticket->id);
                $this->Reverse->set('status_id', 11);
                $this->Reverse->set('observation', $this->request->data['Reverse']['observation']);
                $this->Reverse->set('dateobs', date('Y-m-d H:i:s'));
		if ($this->Reverse->save()) {
			$this->Session->setFlash(__('Coleta Reprovada'));
                        $this->redirect(array('action' => 'index'));
			//$this->redirect(array('action' => 'view', $this->Ticket->id));
		}
		$this->Session->setFlash(__('Não foi possível atender sua solicitação'));
		$this->redirect(array('action' => 'index'));
                }
                
                }

    }

    public function cancel($id = null){
        $this->Reverse->id = $id;
                if ($this->request->is('post')) {
        if (!$this->Reverse->exists()) {
            throw new NotFoundException(__('Invalid ticket'));
        }
        $this->request->onlyAllow('post');
                //$data = array('id' => $this->Ticket->id, 'condition_id' => '2');
                if($this->request->data['Reverse']['observation']== ''){
                    $this->Session->setFlash(__('Digite uma observação para reprovar a coleta'));
                }else{
                $this->Reverse->read(null, $this->Reverse->id);
                $this->Reverse->set('status_id', 1);
                $this->Reverse->set('observation', $this->request->data['Reverse']['observation']);
                $this->Reverse->set('dateobs', date('Y-m-d H:i:s'));
        if ($this->Reverse->save()) {
            $this->Session->setFlash(__('Coleta está aguardando aprovação novamente'));
                        //$this->redirect(array('action' => 'view', $id));
            $this->redirect(array('action' => 'view', $this->Reverse->id));
        }
        $this->Session->setFlash(__('Não foi possível atender sua solicitação'));
        $this->redirect(array('action' => 'index'));
                }
                
                }

    }
    
    public function approve($id = null){
		$this->Reverse->id = $id;
                if ($this->request->is('post')) {
		if (!$this->Reverse->exists()) {
			throw new NotFoundException(__('Invalid ticket'));
		}
		$this->request->onlyAllow('post');
                //$data = array('id' => $this->Ticket->id, 'condition_id' => '2');
                if($this->request->data['Reverse']['so']== ''){
                    $this->Session->setFlash(__('Digite o numero da SO para realizar aprovação'));
                }else{
                $this->Reverse->read(null, $this->Reverse->id);
                $this->Reverse->set('status_id', 10);
                $this->Reverse->set('so', $this->request->data['Reverse']['so']);
                $this->Reverse->set('modified', date('Y-m-d H:i:s'));
		if ($this->Reverse->save()) {
			$this->Session->setFlash(__('Coleta Aprovada'));
                        $this->redirect(array('action' => 'index'));
			//$this->redirect(array('action' => 'view', $this->Ticket->id));
		}
		$this->Session->setFlash(__('Não foi possível atender sua solicitação'));
		$this->redirect(array('action' => 'index'));
                }
                }
    }

    public function inProgress($id = null){
                $this->Reverse->id = $id;
        if ($this->request->is('post')) {
            if (!$this->Reverse->exists()) {
                throw new NotFoundException(__('Coleta Inválida'));
            }
        $this->request->onlyAllow('post');
                //$data = array('id' => $this->Ticket->id, 'condition_id' => '2');
                if($this->request->data['Reverse']['dateProgress']== ''){
                    $this->Session->setFlash(__('Selecione a data da coleta'));
                }else{
                    $this->Reverse->read(null, $this->Reverse->id);
                    $this->Reverse->set('status_id', 3);
                    $this->Reverse->set('inprogress', $this->request->data['Reverse']['dateProgress']);
                    //$this->Reverse->set('modified', date('Y-m-d H:i:s'));
                if ($this->Reverse->save()) {
                    $this->Session->setFlash(__('Coleta Agendada'));
                    //$this->redirect(array('action' => 'index'));
                    $this->redirect(array('action' => 'view', $this->Reverse->id));
                }
            $this->Session->setFlash(__('Não foi possível atender sua solicitação'));
            //$this->redirect(array('action' => 'index'));
            $this->redirect(array('action' => 'view', $this->Reverse->id));
                }
        }
    }
    

    public function heldCollection($id = null){
                $this->Reverse->id = $id;
        if ($this->request->is('post')) {
            if (!$this->Reverse->exists()) {
                throw new NotFoundException(__('Coleta Inválida'));
            }
        $this->request->onlyAllow('post');
                //$data = array('id' => $this->Ticket->id, 'condition_id' => '2');
                if($this->request->data['Reverse']['dateProgress']== ''){
                    $this->Session->setFlash(__('Selecione a data da coleta'));
                }else{
                    $this->Reverse->read(null, $this->Reverse->id);
                    $this->Reverse->set('status_id', 4);
                    $this->Reverse->set('heldcollection', $this->request->data['Reverse']['dateProgress']);
                    //$this->Reverse->set('modified', date('Y-m-d H:i:s'));
                if ($this->Reverse->save()) {
                    $this->Session->setFlash(__('Data da coleta inserida no sistema'));
                    //$this->redirect(array('action' => 'index'));
                    $this->redirect(array('action' => 'view', $this->Reverse->id));
                }
            $this->Session->setFlash(__('Não foi possível atender sua solicitação'));
            //$this->redirect(array('action' => 'index'));
            $this->redirect(array('action' => 'view', $this->Reverse->id));
                }
        }
    }

    public function inCarrier($id = null){
                $this->Reverse->id = $id;
        if ($this->request->is('post')) {
            if (!$this->Reverse->exists()) {
                throw new NotFoundException(__('Coleta Inválida'));
            }
        $this->request->onlyAllow('post');
                //$data = array('id' => $this->Ticket->id, 'condition_id' => '2');
                if($this->request->data['Reverse']['dateProgress']== ''){
                    $this->Session->setFlash(__('Selecione a data da entrega'));
                }else{
                    $this->Reverse->read(null, $this->Reverse->id);
                    $this->Reverse->set('status_id', 15);
                    $this->Reverse->set('incarrier', $this->request->data['Reverse']['dateProgress']);
                    //$this->Reverse->set('modified', date('Y-m-d H:i:s'));
                if ($this->Reverse->save()) {
                    $this->Session->setFlash(__('Data da entrega inserida no sistema'));
                    //$this->redirect(array('action' => 'index'));
                    $this->redirect(array('action' => 'view', $this->Reverse->id));
                }
            $this->Session->setFlash(__('Não foi possível atender sua solicitação'));
            //$this->redirect(array('action' => 'index'));
            $this->redirect(array('action' => 'view', $this->Reverse->id));
                }
        }
    }

    public function inEnvision($id = null){
                $this->Reverse->id = $id;
        if ($this->request->is('post')) {
            if (!$this->Reverse->exists()) {
                throw new NotFoundException(__('Coleta Inválida'));
            }
        $this->request->onlyAllow('post');
                //$data = array('id' => $this->Ticket->id, 'condition_id' => '2');
                if($this->request->data['Reverse']['dateProgress']== '' AND $this->request->data['Reverse']['cte']== ''){
                    $this->Session->setFlash(__('Selecione a data da entrega e prencha o numero de CTE'));
                }else{
                    $this->Reverse->read(null, $this->Reverse->id);
                    $this->Reverse->set('status_id', 16);
                    $this->Reverse->set('cte', $this->request->data['Reverse']['cte']);
                    $this->Reverse->set('inenvision', $this->request->data['Reverse']['dateProgress']);
                    //$this->Reverse->set('modified', date('Y-m-d H:i:s'));
                if ($this->Reverse->save()) {
                    $this->Session->setFlash(__('Dados salvos no sistema com sucesso !'));
                    //$this->redirect(array('action' => 'index'));
                    $this->redirect(array('action' => 'view', $this->Reverse->id));
                }
            $this->Session->setFlash(__('Não foi possível atender sua solicitação'));
            //$this->redirect(array('action' => 'index'));
            $this->redirect(array('action' => 'view', $this->Reverse->id));
                }
        }
    }

    public function sinister($id = null){
                $this->Reverse->id = $id;
        if ($this->request->is('post')) {
            if (!$this->Reverse->exists()) {
                throw new NotFoundException(__('Coleta Inválida'));
            }
        $this->request->onlyAllow('post');
                //$data = array('id' => $this->Ticket->id, 'condition_id' => '2');
                if($this->request->data['Reverse']['observation']== ''){
                    $this->Session->setFlash(__('Digite uma observação'));
                }else{
                    $this->Reverse->read(null, $this->Reverse->id);
                    $this->Reverse->set('status_id', 9);
                    $this->Reverse->set('observation', $this->request->data['Reverse']['observation']);
                    $this->Reverse->set('dateobs', date('Y-m-d H:i:s'));
                if ($this->Reverse->save()) {
                    $this->Session->setFlash(__('Dados salvos no sistema com sucesso !'));
                    //$this->redirect(array('action' => 'index'));
                    $this->redirect(array('action' => 'view', $this->Reverse->id));
                }
            $this->Session->setFlash(__('Não foi possível atender sua solicitação'));
            //$this->redirect(array('action' => 'index'));
            $this->redirect(array('action' => 'view', $this->Reverse->id));
                }
        }
    }

    public function cancell($id = null){
                $this->Reverse->id = $id;
        if ($this->request->is('post')) {
            if (!$this->Reverse->exists()) {
                throw new NotFoundException(__('Coleta Inválida'));
            }
        $this->request->onlyAllow('post');
                //$data = array('id' => $this->Ticket->id, 'condition_id' => '2');
                if($this->request->data['Reverse']['observation']== ''){
                    $this->Session->setFlash(__('Digite uma observação'));
                }else{
                    $this->Reverse->read(null, $this->Reverse->id);
                    $this->Reverse->set('status_id', 5);
                    $this->Reverse->set('observation', $this->request->data['Reverse']['observation']);
                    $this->Reverse->set('dateobs', date('Y-m-d H:i:s'));
                if ($this->Reverse->save()) {
                    $this->Session->setFlash(__('Dados salvos no sistema com sucesso !'));
                    //$this->redirect(array('action' => 'index'));
                    $this->redirect(array('action' => 'view', $this->Reverse->id));
                }
            $this->Session->setFlash(__('Não foi possível atender sua solicitação'));
            //$this->redirect(array('action' => 'index'));
            $this->redirect(array('action' => 'view', $this->Reverse->id));
                }
        }
    }

    public function occurrence($id = null){
                $this->Reverse->id = $id;
        if ($this->request->is('post')) {
            if (!$this->Reverse->exists()) {
                throw new NotFoundException(__('Coleta Inválida'));
            }
        $this->request->onlyAllow('post');
                //$data = array('id' => $this->Ticket->id, 'condition_id' => '2');
                if($this->request->data['Reverse']['observation']== ''){
                    $this->Session->setFlash(__('Digite uma observação'));
                }else{
                    $this->Reverse->read(null, $this->Reverse->id);
                    $this->Reverse->set('status_id', 8);
                    $this->Reverse->set('observation', $this->request->data['Reverse']['observation']);
                    $this->Reverse->set('dateobs', date('Y-m-d H:i:s'));
                if ($this->Reverse->save()) {
                    $this->Session->setFlash(__('Dados salvos no sistema com sucesso !'));
                    //$this->redirect(array('action' => 'index'));
                    $this->redirect(array('action' => 'view', $this->Reverse->id));
                }
            $this->Session->setFlash(__('Não foi possível atender sua solicitação'));
            //$this->redirect(array('action' => 'index'));
            $this->redirect(array('action' => 'view', $this->Reverse->id));
                }
        }
    }

    
        public function exportData($id = null){
            $this->Userid = $id;
                $reverses = $this->Reverse->find('all', 
                    array(
                        'conditions' => array(
                            'Reverse.user_id' => $this->Userid
                        )));
            
                $this->set(compact('reverses'));
                $this->layout = null;
                $this->autoLayout = false;
                Configure::write('debug', '0');
        }
        
	public function correction($id = null) {
            $this->Reverse->id = $id;
		if ($this->request->is('post')) {
			//$this->Upload->create();
			//if ($this->Upload->save($this->request->data)) {
                            //$this->request->data['Upload']['reverse_id'] = $this->Upload->Reverse->getInsertID() + 1;
                            //$this->request->data['Upload']['reverse_id'] = $this->Upload->Reverse->id;
                           // $this->Upload->set('reverse_id', '$this->Upload->Reverse->id');
                           // $this->Upload->Reverse->set('status_id', 11);
				//$this->Session->setFlash(__('The upload has been saved.'));
				//return $this->redirect(array('controller' => 'Reverses' ,'action' => 'view', $this->Upload->Reverse->id));
			//} else {
				//$this->Session->setFlash(__('The upload could not be saved. Please, try again.'));
			//}
			try {
                $this->request->data['Reverse']['reverse_id'] = $this->Reverse->id;
                $this->request->data['Reverse']['status_id'] = '11';
				$this->Reverse->createWithAttachments($this->request->data);
                                //$this->Upload->Reverse->saveAll($this->request->data);
				$this->Session->setFlash(__('Correção enviada com sucesso'));
                                return $this->redirect(array('controller' => 'Reverses' ,'action' => 'view', $this->Reverse->id));
			} catch (Exception $e) {
				$this->Session->setFlash($e->getMessage());
			}
		}
		$types = $this->Reverse->Upload->Type->find('list');
		$reverses = $this->Reverse->Upload->find('list');
		$this->set(compact('types', 'reverses'));
	}



        public function report(){
                            
                                 }
        
        public function export(){
                $dataDe = $this->request->data['Reverse']['from'];
                $dataAte = $this->request->data['Reverse']['to'];
                $reverse = $this->paginate = array(
                    'conditions' => array(
                       // 'AND' => array(
                                'AND' => array(
                                    //'Reverse.status_id' => $statusColeta,
                                    //'Reverse.user_id' => $userId,
                                    
                                ),
                                'OR' => array(
                                    
                                    'Reverse.created BETWEEN ? AND ? ' => array($dataDe, $dataAte),
                                       
                                )
                            //)
                        ),
                    'limit' => '2000'
                ); 
                $reverses = $this->paginate('Reverse');
                //$this->set(compact('reverses'));

               // $reverses = $this->Reverse->find('all');
                $_serialize = 'reverses';
                $_delimiter = ';';
                $_header = array('Numero da Coleta', 'Numero NF Posto', 'Serie NF', 'Volume', 'Valor NF', 'Nome do Usuario', 'Nome do Posto', 'Status', 'Centro de Custo', 'Numero de SO', 'Data Solicitacao', 'Data Aprovacao', 'Observacao', 'NF de Origem', 'Modelo');
                $_extract = array('Reverse.id', 'Reverse.invoice', 'Reverse.serie', 'Reverse.quantity', 'Reverse.amount', 'User.name', 'User.username', 'Status.name', 'Cost.name', 'Reverse.so', 'Reverse.created', 'Reverse.modified', 'Reverse.observation', 'Reverse.reverse', 'ReversesProduct.material');

                $this->viewClass = 'CsvView.Csv';
                $this->set(compact('reverses', '_serialize', '_header', '_extract', '_delimiter'));

		//$this->Export->exportCsv($reverses, 'reverses'.date('Y-m-d H:i:s').'.csv');
        }

    public function gchart(){
        
    }        

    public function chart() {
        //$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $dataDe = $this->request->data['Reverse']['from'];
            $dataAte = $this->request->data['Reverse']['to'];

            //$this->Userid = $id;
            $reverses = $this->Reverse->find('all', 
                    array(
                        'conditions' => array(
                            'Reverse.created BETWEEN ? AND ? ' => array($dataDe, $dataAte),
                        ),
                        'order' => array('Reverse.created' => 'ASC'),
                        'group' => array('Reverse.status_id'),
                        'fields' => array(
                            'Status.name',
                            'Count(Reverse.status_id) as Total',
                            'Reverse.status_id',
                            'Reverse.created',
                        )
                    )
                    );
            
            $charts = new GoogleChart();
            
            $charts->type('PieChart');
            $charts->options(array('title' => 'Coletas Reversas', 'width' => '640', 'height' => '480', 'isStacked' => 'true'));
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
             
            //$total = $this->Reverse->find('all', 
                    //array(
                       // 'conditions' => array(
                            //'Reverse.user_id' => $this->Userid,
                        //),
                    //)
                   // );
                
                //$this->set('user', $this->User->find('first', $options));
                $this->set(compact('charts'));
    }

    public function reverses(){

        $reverses = $this->Reverse->find('all', 
                        array(
                            'conditions' => array(
                                'Reverse.status_id' => 1,
                            ),
                            //'order' => array('Reverse.created' => 'ASC'),
                            //'group' => array('Reverse.status_id'),
                            //'fields' => array(
                            //    'Reverse.id',
                            //    'User.name',
                            //    'User.email',
                            //    'Count(Reverse.user_id) as Total',
                            //    'Reverse.status_id',
                            )
                        //)
                    );

        foreach ($reverses as $row) {
          // $rev = $row['Reverse']['id'];

           $Email = new CakeEmail('smtp');
           $Email->To($row['User']['email']);
           $Email->subject('Coletas Pendentes - Envision');
           $Email->template('coletas', 'coletas_layout');
           $Email->emailFormat('html');

           $Email->viewVars(array(
                'nome' => $row['User']['name'],
                'reverse' => $row['Reverse']['id'],
                //'total' => Total,
            ));

           $resultado = $Email->send();
        }

        

        



        $this->set(compact('reverses'));

        //Debugger::dump($reverses);
    }


}
