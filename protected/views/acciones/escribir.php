<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
?>

<div class="col s4 center paddingTop50">
    <img src="<?php echo Yii::app()->baseUrl . '/images'; ?>/escribir.png" alt=""/>
</div>

<form method="post">
  Tu párrafo:<br>
  <input type="text" name="parrafo"><br>
  <div class="row buttons center">
            <button class="btn waves-effect waves-light" type="submit" name="action">Enviar
            </button>
        </div>
</form>