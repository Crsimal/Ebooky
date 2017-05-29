<?php
/* @var $this HistoriasController */
/* @var $data Historias */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_historia')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_historia), array('view', 'id'=>$data->id_historia)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('titulo')); ?>:</b>
	<?php echo CHtml::encode($data->titulo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('limiteCaracteres')); ?>:</b>
	<?php echo CHtml::encode($data->limiteCaracteres); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('categoria')); ?>:</b>
	<?php echo CHtml::encode($data->categoria); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('terminada')); ?>:</b>
	<?php echo CHtml::encode($data->terminada); ?>
	<br />


</div>