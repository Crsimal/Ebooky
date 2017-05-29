<?php
/* @var $this ParrafosController */
/* @var $model Parrafos */

$this->breadcrumbs=array(
	'Parrafoses'=>array('index'),
	$model->id_parrafo,
);

$this->menu=array(
	array('label'=>'List Parrafos', 'url'=>array('index')),
	array('label'=>'Create Parrafos', 'url'=>array('create')),
	array('label'=>'Update Parrafos', 'url'=>array('update', 'id'=>$model->id_parrafo)),
	array('label'=>'Delete Parrafos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_parrafo),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Parrafos', 'url'=>array('admin')),
);
?>

<h1>View Parrafos #<?php echo $model->id_parrafo; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_parrafo',
		'contenido',
		'id_usuario',
		'votos',
		'votacionActual',
		'publicado',
		'id_historia',
	),
)); ?>
