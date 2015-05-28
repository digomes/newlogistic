<?php
/**
 *
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
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'Sistema Logística Reversa');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>
		<?php //echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css(array('select2/select2', 'bootstrap', 'bootstrap-responsive', 'custom', '//cdn.datatables.net/1.10.0/css/jquery.dataTables.css', '//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css'));
                
                echo $this->Html->script(array('jquery', 'jquery-ui', 'html5shiv', 'bootstrap', 'modernizr', 'modal', 'flash', 'addProduto', 'jquery.dataTables', 'dataTable', 'addCampo', 'ckeditor/ckeditor', 'datepicker', 'placeholder', 'masked', 'custom', 'maskmoney'));
                
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
                
                $cbunny = array(
                    'APP_PATH' => Router::url('/',true)
                );

                echo $this->Html->scriptBlock('var CbunnyObj = ' . $this->Javascript->object($cbunny) . ';');
	?>
</head>
<body>
<div id="wrap">    
    <div class="navbar navbar-inverse ">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">Logística Reversa</a>
          <div class="nav-collapse collapse">
              <p class="navbar-text pull-right">Você está logado como <?php echo $this->Html->link($this->Session->read('Auth.User.name'), array('controller' => 'Users', 'action' => 'view', $this->Session->read('Auth.User.id')), array('class' => 'navbar-link'))?></p>
                <?php echo $this->MenuBuilder->build('main-menu', array('class' => 'nav')); ?>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    
	<div id="container" class="container">
		<div id="content">

			<?php echo $this->Session->flash(); ?>
 

			<?php echo $this->fetch('content'); ?>
                <div id="push"></div>      
		</div>
         
	</div>
    </div> 
                <div id="footer">
                    <div class="container">
                        <p class="muted credit">&copy; Envision 2014</p>
                    </div>
                </div> 
   
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
