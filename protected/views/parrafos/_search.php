<?php
/* @var $this ParrafosController */
/* @var $model Parrafos */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_parrafo'); ?>
		<?php echo $form->textField($model,'id_parrafo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'contenido'); ?>
		<?php echo $form->textField($model,'contenido',array('size'=>60,'maxlength'=>3000)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_usuario'); ?>
		<?php echo $form->textField($model,'id_usuario'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'votos'); ?>
		<?php echo $form->textField($model,'votos'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'votacionActual'); ?>
		<?php echo $form->textField($model,'votacionActual'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'publicado'); ?>
		<?php echo $form->textField($model,'publicado'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_historia'); ?>
		<?php echo $form->textField($model,'id_historia'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->