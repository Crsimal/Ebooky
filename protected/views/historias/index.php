<?php
/* @var $this HistoriasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Historiases',
);

$this->menu=array(
	array('label'=>'Create Historias', 'url'=>array('create')),
	array('label'=>'Manage Historias', 'url'=>array('admin')),
);
?>

<h1>Historiases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
