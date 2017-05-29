<?php
/* @var $this HistoriasController */
/* @var $model Historias */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'historias-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_historia'); ?>
		<?php echo $form->textField($model,'id_historia'); ?>
		<?php echo $form->error($model,'id_historia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'titulo'); ?>
		<?php echo $form->textField($model,'titulo',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'titulo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'limiteCaracteres'); ?>
		<?php echo $form->textField($model,'limiteCaracteres'); ?>
		<?php echo $form->error($model,'limiteCaracteres'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'categoria'); ?>
		<?php echo $form->textField($model,'categoria',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'categoria'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'terminada'); ?>
		<?php echo $form->textField($model,'terminada'); ?>
		<?php echo $form->error($model,'terminada'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->