<?php
/* @var $this ParrafosController */
/* @var $model Parrafos */

$this->breadcrumbs=array(
	'Parrafoses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Parrafos', 'url'=>array('index')),
	array('label'=>'Manage Parrafos', 'url'=>array('admin')),
);
?>

<h1>Create Parrafos</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>