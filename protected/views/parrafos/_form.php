<?php
/* @var $this ParrafosController */
/* @var $model Parrafos */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'parrafos-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_parrafo'); ?>
		<?php echo $form->textField($model,'id_parrafo'); ?>
		<?php echo $form->error($model,'id_parrafo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contenido'); ?>
		<?php echo $form->textField($model,'contenido',array('size'=>60,'maxlength'=>3000)); ?>
		<?php echo $form->error($model,'contenido'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_usuario'); ?>
		<?php echo $form->textField($model,'id_usuario'); ?>
		<?php echo $form->error($model,'id_usuario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'votos'); ?>
		<?php echo $form->textField($model,'votos'); ?>
		<?php echo $form->error($model,'votos'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'votacionActual'); ?>
		<?php echo $form->textField($model,'votacionActual'); ?>
		<?php echo $form->error($model,'votacionActual'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'publicado'); ?>
		<?php echo $form->textField($model,'publicado'); ?>
		<?php echo $form->error($model,'publicado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_historia'); ?>
		<?php echo $form->textField($model,'id_historia'); ?>
		<?php echo $form->error($model,'id_historia'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->