<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
?>





<div class="row center-align menuContainer center" >
    <div class="col s12 m4">
        <a href="index.php?r=acciones/leer" class="tooltipped" data-position="right" data-delay="50" data-tooltip="Lee la historia creada!"><img src="<?php echo Yii::app()->baseUrl . '/images'; ?>/leer.png" alt="book"/></a>
        <p>Leer</p>
    </div>
    <div class="col s12 m4"></div>
    <div class="col s12 m4">
        <a href="index.php?r=acciones/votar" class="tooltipped" data-position="right" data-delay="50" data-tooltip="Vota los parrafos!"><img src="<?php echo Yii::app()->baseUrl . '/images'; ?>/votar.png" alt=""/></a>
        <p>Votar</p>
    </div>
</div>
<div class="row center-align menuContainer">
    <div class="col s12 m4">
        <a href="index.php?r=acciones/escribir" class="tooltipped" data-position="right" data-delay="50" data-tooltip="Envía tu párrafo!"><img src="<?php echo Yii::app()->baseUrl . '/images'; ?>/escribir.png" alt=""/></a>
        <p>Escribir</p>
    </div>
    <div class="col s12 m4"></div>
    <div class="col s12 m4">
        <a href="index.php?r=about/index" ><img src="<?php echo Yii::app()->baseUrl . '/images'; ?>/about.png" alt=""/></a>
        <p>¿Como funciona?</p>
    </div>
</div>




