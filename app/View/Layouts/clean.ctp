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
		//echo $this->Html->meta('icon');

		echo $this->Html->css(array('bootstrap', 'bootstrap-responsive', 'custom', '//cdn.datatables.net/1.10.0/css/jquery.dataTables.css'));
                
                echo $this->Html->script(array('jquery', 'jquery-ui', 'html5shiv', 'bootstrap', 'modernizr', 'modal', 'flash', 'addProduto', 'jquery.dataTables', 'dataTable', 'addCampo'));
                
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
                
                $cbunny = array(
                    'APP_PATH' => Router::url('/',true)
                );

                echo $this->Html->scriptBlock('var CbunnyObj = ' . $this->Javascript->object($cbunny) . ';');
	?>
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="https://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
	<div id="container" class="container">
                <div id="header">
            		<?php echo $this->Session->flash(); ?>
                </div>

		<div id="content">
			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">

		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
