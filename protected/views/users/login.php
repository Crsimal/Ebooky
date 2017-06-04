<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle = Yii::app()->name . ' - Login';
$this->breadcrumbs = array(
    'Login',
);
?>



<div class="form">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'login-form',
        'enableClientValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
    ));
    ?>

    
    <div class="centradoEstrecho center">
        
        <img src="<?php echo Yii::app()->baseUrl.'/images';?>/login.png" alt="book"/>
        </br>
        </br>
        <div class="row">
            <?php echo $form->labelEx($model, 'Nickname'); ?>
            <?php echo $form->textField($model, 'username'); ?>
            <?php echo $form->error($model, 'username'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model, 'Password'); ?>
            <?php echo $form->passwordField($model, 'password'); ?>
            <?php echo $form->error($model, 'password'); ?>
        </div>

        </br>
        <div class="row buttons center">
            <button class="btn waves-effect waves-light" type="submit" name="action">Conectarse
            </button>
        </div>
    </div>

    <?php $this->endWidget(); ?>
</div><!-- form -->
