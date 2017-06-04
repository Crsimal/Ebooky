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
    
    $usuario = $users->findByAttributes(array("nickname" => Yii::app()->user->name));
    ?>



    <?php echo $form->errorSummary($users); ?>

    <div class="centradoEstrecho">
        <div class="row">
            <?php echo $form->labelEx($users, 'Nombre'); ?>
            <?php echo $form->textField($users, 'name'); ?>
            <?php echo $form->error($users, 'name'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($users, 'Apellido'); ?>
            <?php echo $form->textField($users, 'surname'); ?>
            <?php echo $form->error($users, 'surname'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($users, 'Password'); ?>
            <?php echo $form->textField($users, 'password'); ?>
            <?php echo $form->error($users, 'password'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($users, 'Ciudad'); ?>
            <?php echo $form->textField($users, 'city'); ?>
            <?php echo $form->error($users, 'city'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($users, 'Email'); ?>
            <?php echo $form->textField($users, 'email'); ?>
            <?php echo $form->error($users, 'email'); ?>
        </div>



        <div class="row">
            <?php echo $form->labelEx($users, 'Nick'); ?>
            <?php echo $form->textField($users, 'nickname'); ?>
            <?php echo $form->error($users, 'nickname'); ?>
        </div>


        <div class="row buttons center">
            <button class="btn waves-effect waves-light" type="submit" name="action">Actualizar
            </button>
        </div>
    </div>

    <?php $this->endWidget(); ?>
    <form method="POST">
        <div class="row buttons center">
            <input type="hidden" name="eliminar" value="<?php echo $usuario->id_usuario; ?>">
            <button class="btn waves-effect waves-light" type="submit" name="elimina">Eliminar Usuario
            </button>
        </div>
    </form>

</div><!-- form -->