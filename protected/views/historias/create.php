<?php
/* @var $this HistoriasController */
/* @var $model Historias */

$this->breadcrumbs=array(
	'Historiases'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Historias', 'url'=>array('index')),
	array('label'=>'Manage Historias', 'url'=>array('admin')),
);
?>

<h1>Create Historias</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>