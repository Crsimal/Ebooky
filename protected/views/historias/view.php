<?php
/* @var $this HistoriasController */
/* @var $model Historias */

$this->breadcrumbs=array(
	'Historiases'=>array('index'),
	$model->id_historia,
);

$this->menu=array(
	array('label'=>'List Historias', 'url'=>array('index')),
	array('label'=>'Create Historias', 'url'=>array('create')),
	array('label'=>'Update Historias', 'url'=>array('update', 'id'=>$model->id_historia)),
	array('label'=>'Delete Historias', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_historia),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Historias', 'url'=>array('admin')),
);
?>

<h1>View Historias #<?php echo $model->id_historia; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_historia',
		'titulo',
		'limiteCaracteres',
		'categoria',
		'terminada',
	),
)); ?>
