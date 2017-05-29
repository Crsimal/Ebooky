<?php
/* @var $this ParrafosController */
/* @var $data Parrafos */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_parrafo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_parrafo), array('view', 'id'=>$data->id_parrafo)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contenido')); ?>:</b>
	<?php echo CHtml::encode($data->contenido); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_usuario')); ?>:</b>
	<?php echo CHtml::encode($data->id_usuario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('votos')); ?>:</b>
	<?php echo CHtml::encode($data->votos); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('votacionActual')); ?>:</b>
	<?php echo CHtml::encode($data->votacionActual); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('publicado')); ?>:</b>
	<?php echo CHtml::encode($data->publicado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_historia')); ?>:</b>
	<?php echo CHtml::encode($data->id_historia); ?>
	<br />


</div>