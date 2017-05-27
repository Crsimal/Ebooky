<?php
/* @var $this HistoriasController */
/* @var $model Historias */

$this->breadcrumbs=array(
	'Historiases'=>array('index'),
	$model->id_historia=>array('view','id'=>$model->id_historia),
	'Update',
);

$this->menu=array(
	array('label'=>'List Historias', 'url'=>array('index')),
	array('label'=>'Create Historias', 'url'=>array('create')),
	array('label'=>'View Historias', 'url'=>array('view', 'id'=>$model->id_historia)),
	array('label'=>'Manage Historias', 'url'=>array('admin')),
);
?>

<h1>Update Historias <?php echo $model->id_historia; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>