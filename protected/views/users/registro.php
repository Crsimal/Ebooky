<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'users-registro-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // See class documentation of CActiveForm for details on this,
        // you need to use the performAjaxValidation()-method described there.
        'enableAjaxValidation' => false,
    ));
    ?>



    <?php echo $form->errorSummary($model); ?>

    <div class="centradoEstrecho">
        <div class="row">
            <?php echo $form->labelEx($model, 'Nombre'); ?>
            <?php echo $form->textField($model, 'name'); ?>
            <?php echo $form->error($model, 'name'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model, 'Apellido'); ?>
            <?php echo $form->textField($model, 'surname'); ?>
            <?php echo $form->error($model, 'surname'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model, 'Password'); ?>
            <?php echo $form->textField($model, 'password'); ?>
            <?php echo $form->error($model, 'password'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model, 'Ciudad'); ?>
            <?php echo $form->textField($model, 'city'); ?>
            <?php echo $form->error($model, 'city'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model, 'Email'); ?>
            <?php echo $form->textField($model, 'email'); ?>
            <?php echo $form->error($model, 'email'); ?>
        </div>



        <div class="row">
            <?php echo $form->labelEx($model, 'Nick'); ?>
            <?php echo $form->textField($model, 'nickname'); ?>
            <?php echo $form->error($model, 'nickname'); ?>
        </div>


        <div class="row buttons center">
            <button class="btn waves-effect waves-light" type="submit" name="action">Enviar
            </button>
        </div>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->