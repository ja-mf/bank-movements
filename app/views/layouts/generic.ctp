<?php
/**
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.libs.view.templates.layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');
		echo $this->Html->css('colors');
		echo $scripts_for_layout;
	?>
<?
# calendar stuff
?>
	<?php #echo $this->Html->script(array('jscalendar/jscal2', 'jscalendar/lang/en')); ?>
	<?php #echo $html->css('jscal2', 'stylesheet')."\n"; ?>
	<?php #echo $html->css('border-radius', 'stylesheet')."\n"; ?>
	<?php #echo $html->css('steel/steel', 'stylesheet')."\n"; ?>
	<?php //echo $html->css('gold/gold', 'stylesheet')."\n"; ?>
	<?php //echo $html->css('matrix/matrix', 'stylesheet')."\n"; ?>
	<?php //echo $html->css('win2k/win2k', 'stylesheet')."\n"; ?>
	<?php echo $javascript->link('jquery-1.4.2.min'); ?>
	<?php echo $javascript->link('jquery-ui-1.8.4.custom.min.js'); ?>
	<?php echo $html->css('jquery-ui-1.8.4.custom.css', 'stylesheet'); ?>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1>Movimientos Bancarios</h1>
		</div>
		<div id="content">

			<?= $this->Html->link('Agregar movimiento', '/movements/add') ?>
			<?php echo $this->Session->flash(); ?>

			<?php echo $content_for_layout; ?>

		</div>
	</div>
</body>
</html>
