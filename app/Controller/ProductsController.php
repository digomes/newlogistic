<?php
App::uses('AppController', 'Controller');
/**
 * Products Controller
 *
 * @property Product $Product
 * @property PaginatorComponent $Paginator
 */
class ProductsController extends AppController {
    
   
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
            
        $counter = 0;
        if ($this->Session->read('Counter')) {
            $counter = $this->Session->read('Counter');
        }
		$this->Product->recursive = 0;
                $this->paginate = array('limit' => 10000);
            
                $products = $this->paginate('Product');
                $this->set(compact('products'));
                $this->set('counter');
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Product->exists($id)) {
			throw new NotFoundException(__('Invalid product'));
		}
		$options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
		$this->set('product', $this->Product->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Product->create();
			if ($this->Product->save($this->request->data)) {
				$this->Session->setFlash(__('The product has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The product could not be saved. Please, try again.'));
			}
		}
		//$reverses = $this->Product->Reverse->find('list');
		//$this->set(compact('reverses'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Product->exists($id)) {
			throw new NotFoundException(__('Invalid product'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Product->save($this->request->data)) {
				$this->Session->setFlash(__('The product has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The product could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
			$this->request->data = $this->Product->find('first', $options);
		}
		//$reverses = $this->Product->Reverse->find('list');
		//$this->set(compact('reverses'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Product->id = $id;
		if (!$this->Product->exists()) {
			throw new NotFoundException(__('Invalid product'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Product->delete()) {
			$this->Session->setFlash(__('The product has been deleted.'));
		} else {
			$this->Session->setFlash(__('The product could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
        
	public function getByCategory() {

		$category_id = $_GET['data']['Reverse']['category_id'];
                
                //print_r($type_id);
 
		$categories = $this->Product->find('list', array(
			'conditions' => array('Product.category_id' => $category_id),
			'recursive' => -1
			));
 
		$this->set('categories',$categories);
		$this->layout = 'ajax';
	}
        
        public function search() {
            //$this->autoRender = false;
            if(isset($this->request->data)){
           if ($this->request->is('post')) {
            // get the search term from URL
            $type = $this->request->data['Product']['type'];
            $manufact = $this->request->data['Product']['manufacturer'];
            $category = $this->request->data['Product']['category'];
            
            
                $this->paginate = array(
                    'conditions' => array(
                        'AND' => array(
                              'Product.type' => $type,
                              'Product.manufacturer' => $manufact,
                              'Product.category' => $category,
			),

                    ),
                    'limit' => 100
                );
            
                $products = $this->paginate('Product');
                $this->set(compact('products'));
           }
            }
        }
        
        public function addProd($id = null) {
		if ($this->request->is('ajax')) {

			$id = $this->request->data['id'];

			//$product = $this->Cart->add($id, $quantity, $productmodId);
		
            //check if prodocut is in a cart
            $productsInCart = $this->Session->read('Cart');
            $alreadyIn = false;
            foreach ($productsInCart as $productInCart) {
                if ($productInCart['Product']['id'] == $id) {
                    $alreadyIn = true;
                }
            }
           
            //if product isn't in a cart add it and set counter value
            if (!$alreadyIn) {
                $amount = count($productsInCart);
                $this->Session->write('Cart.' . $amount, $this->Product->read(null, $id));
                $this->Session->write('Counter', $amount + 1);
                $this->Session->setFlash(__('Produto Adicionado com Sucesso'));

            } else {
                $amount = count($productsInCart);
                $this->Session->write('Cart.' . $amount, $this->Product->read(null, $id));
                $this->Session->write('Counter', $amount + 1);
                $this->Session->setFlash(__('Produto Adicionado com Sucesso'));
          
            }
             }
             return $productsInCart;
             $this->redirect($this->referer());
            //$this->redirect(array('controller' => 'products', 'action' => 'index'));
        }

        public function delProd($id = null) {
            if (is_null($id)) {
                throw new NotFoundException(__('Invalid request'));
            }
            
            //delete product from cart
            if ($this->Session->delete('Cart.' . $id)) {
                //sort cart elements 
                $cart = $this->Session->read('Cart');
                sort($cart);
                $this->Session->write('Cart', $cart);
                //updeate counter
                $this->Session->write('Counter', count($cart));
                $this->Session->setFlash('Produto Deletado com Sucesso');
            }
                $this->redirect($this->referer());
        }

        public function cart() {
            //show all elemnts in a cart
            $cart = array();
            
            if ($this->Session->check('Cart')) {
                $cart = $this->Session->read('Cart');
            }
            
                if (!empty($this->request->params['requested'])){
                    return $cart;
                }else{
                    $this->set(compact('cart', $cart));
                }

            
        }

        public function empty_cart() {
            //delete cart with all elements and counter
            $this->Session->delete('Cart');
            $this->Session->delete('Counter');
            $this->redirect($this->referer());
        }
        
        public function prdlist(){
            
            if(isset($this->request->data)){
           if ($this->request->is('post')) {
            // get the search term from URL
            $material = $this->request->data['Product']['material'];   
            $type = $this->request->data['Product']['type'];
            $manufact = $this->request->data['Product']['manufacturer'];
            $category = $this->request->data['Product']['category'];
            
            
                $this->paginate = array(
                    'conditions' => array(

                                    array(
					'OR' => array(
                              'Product.material LIKE ' => '%' . $material . '%', 
                              'Product.description LIKE ' => '%' . $material . '%',
					),
				),
				array(
					'OR' => array(
                              'Product.type LIKE' => '%' . $type . '%',
                              'Product.manufacturer LIKE' => '%' . $manufact . '%',
                              'Product.category LIKE' => '%' . $category . '%',
					),
				),


                    ),
                    'limit' => 1000
                );
            
            $products = $this->paginate('Product');
            $this->set(compact('products'));
           }
            }
            
            $categories = $this->Product->find('list', array(
                'fields' => array('Product.category'),
                'group' => array('Product.category'),
                ));
            $types = $this->Product->find('list', array(
                'fields' => array('Product.type'),
                'group' => array('Product.type'),
                ));
            $manufacturers = $this->Product->find('list', array(
                'fields' => array('Product.manufacturer'),
                'group' => array('Product.manufacturer'),
                ));
            
            
            $this->set(compact('categories', 'types', 'manufacturers', 'products'));
            $this->layout = ('clean');
        }
}
