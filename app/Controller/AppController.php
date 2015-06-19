<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');
App::uses('GoogleChart', 'GoogleChart.Lib');
/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    public $components = array(
        'Acl',
        'Auth' => array(
            'authorize' => array(
                'Actions' => array('actionPath' => 'controllers')
            )
        ),
        'Session',
        //'Export.Export',
    );
    
    public $helpers = array(
        'Html', 
        'Form', 
        'Session',
        'GoogleChart.GoogleChart',
        'MenuBuilder.MenuBuilder' => array(
        'activeClass' => 'active', 
        'firstClass' => 'first-item',  
        'childrenClass' => 'dropdown',   
        'evenOdd' => false, 
        //'itemFormat' => '<li%s class="dropdown">%s%s</li>',
        //'wrapperFormat' => '<ul%s>%s</ul>',
        'noLinkFormat' => '<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">%s</a>',
        'menuVar' => 'menu',
        'authVar' => 'user',
        'authModel' => 'User',
        'authField' => 'group_id',
            )
        );
    
    
    public function beforeFilter() {
        parent::beforeFilter();
        
        $this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');
        $this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login');
        $this->Auth->loginRedirect = array('controller' => 'reverses', 'action' => 'search');

        $user = $this->Session->read('Auth');
        $this->set(compact('user'));
        
    $menu = array(
        'main-menu' => array(
            array(
                'title' => 'Inicio',
                'url' => array('controller' => 'reverses', 'action' => 'search'),
                'permissions' => array('1', '2', '3', '4'),
            ),
            array(
                'title' => 'Relatório',
                //'url' => array('controller' => 'ReversesProducts', 'action' => 'report'),
                'permissions' => array('1', '2'),
                'children' => array(
                    array(
                        'title' => __('Relatório Formato Antigo'),
                        'url' => array('controller' => 'Reverses', 'action' => 'report'),
                        'permissions' => array('1', '2'),
                    ),
                    array(
                        'title' => __('Relatório Formato Novo'),
                        'url' => array('controller' => 'ReversesProducts', 'action' => 'report'),                     
                        'permissions' => array('1', '2'),    
                    )
                )
            ),
            array(
                'title' => 'Gráfico',
                'url' => array('controller' => 'reverses', 'action' => 'gchart'),
                'permissions' => array('1'),
            ),
            array(
                'title' => 'Meu Perfil',
                'url' => array('controller' => 'Users', 'action' => 'view', $this->Session->read('Auth.User.id')),
                'permissions' => array('1', '2', '3', '4'),
            ),
            array(
                'title' => 'Usuários',
                'url' => array('controller' => 'Users', 'action' => 'index'),
                'permissions' => array('1'),
            ),
            array(
                'title' => 'Postos',
                'url' => array('controller' => 'Workshops', 'action' => 'index'),
                'permissions' => array('1'),
            ),
            array(
                'title' => 'Grupos',
                'url' => array('controller' => 'Groups', 'action' => 'index'),
                'permissions' => array('1'),
            ),
            array(
                'title' => 'Categorias',
                'url' => array('controller' => 'Categories', 'action' => 'index'),
                'permissions' => array('1'),
            ),
            array(
                'title' => 'Produtos',
                'url' => array('controller' => 'Products', 'action' => 'index'),
                'permissions' => array('1'),
            ),
            array(
                'title' => 'Status',
                'url' => array('controller' => 'statuses', 'action' => 'index'),
                'permissions' => array('1'),
            ),
            array(
                'title' => 'Transportadoras',
                'url' => array('controller' => 'carriers', 'action' => 'index'),
                'permissions' => array('1'),
            ),
            array(
                'title' => 'Coletas',
                //'url' => array('controller' => 'carriers', 'action' => 'index'),
                'permissions' => array('1'),
                'children' => array(
                    array(
                        'title' => __('Adicionar'),
                        'url' => array('controller' => 'Collections', 'action' => 'add'),
                        'permissions' => array('1'),
                    ),
                )
            ),
            array(
                'title' => 'Logout',
                'url' => array('controller' => 'Users', 'action' => 'logout'),
                'permissions' => array('1', '2', '3', '4'),
            ),
        ),
    );

    // For default settings name must be menu
    $this->set(compact('menu'));
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}
