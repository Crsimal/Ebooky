<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
?>

<!--Vista enviar párrafo -->
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl . '/js/main.js'; ?>"></script>
<div class="col s4 center paddingTop50">
    <img src="<?php echo Yii::app()->baseUrl . '/images'; ?>/escribir.png" alt=""/>
</div>

<form method="post">
    <div class="row">
        <form class="">
            <div class="row">
                <div class="input-field col s8 offset-s2">
                    <textarea id="textarea1" class="materialize-textarea" name="parrafo" maxlength="2500"></textarea>
                    <label for="textarea1">Tu párrafo</label>
                    <button class="btn waves-effect waves-light" type="submit" name="action">Enviar</button>
                </div>
                <div id="contador">  
                </div> 
            </div>
        </form>
    </div>
</form>


    
 

