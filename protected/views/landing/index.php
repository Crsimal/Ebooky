<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
?>


<div class="container" >

  

</div>


<hr>

<div class="row center-align menuContainer center" >
    <div class="col s12 m4">
        <a href="index.php?r=acciones/leer" ><img src="<?php echo Yii::app()->baseUrl . '/images'; ?>/leer.png" alt="book"/></a>
        <p>Leer</p>
    </div>
    <div class="col s12 m4"></div>
    <div class="col s12 m4">
        <a href="index.php?r=acciones/votar" ><img src="<?php echo Yii::app()->baseUrl . '/images'; ?>/votar.png" alt=""/></a>
        <p>Votar</p>
    </div>
</div>
<div class="row center-align menuContainer">
    <div class="col s12 m4">
        <a href="index.php?r=acciones/escribir" ><img src="<?php echo Yii::app()->baseUrl . '/images'; ?>/escribir.png" alt=""/></a>
        <p>Escribir</p>
    </div>
    <div class="col s12 m4"></div>
    <div class="col s12 m4">
        <a href="index.php?r=about/index" ><img src="<?php echo Yii::app()->baseUrl . '/images'; ?>/about.png" alt=""/></a>
        <p>About</p>
    </div>
</div>

<hr>


