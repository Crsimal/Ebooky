<?php
/* @var $this ParrafosController */
/* @var $model Parrafos */

$this->breadcrumbs=array(
	'Parrafoses'=>array('index'),
	$model->id_parrafo=>array('view','id'=>$model->id_parrafo),
	'Update',
);

$this->menu=array(
	array('label'=>'List Parrafos', 'url'=>array('index')),
	array('label'=>'Create Parrafos', 'url'=>array('create')),
	array('label'=>'View Parrafos', 'url'=>array('view', 'id'=>$model->id_parrafo)),
	array('label'=>'Manage Parrafos', 'url'=>array('admin')),
);
?>

<h1>Update Parrafos <?php echo $model->id_parrafo; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>