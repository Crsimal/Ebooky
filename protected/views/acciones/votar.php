<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;

?>

<div class="col s4 paddingTop50 center">
          <a href="index.php?r=acciones/votar" ><img src="<?php echo Yii::app()->baseUrl.'/images';?>/votar.png" alt=""/></a>
      </div>


<?php
/* @var $this SiteController */


$parrafos = $model->findAllByAttributes(array("votacionActual" => 1));
//$parrafos = $model->findAll();

foreach ($parrafos as $parrafo){
    
    echo "<div class='  parrafoVotacion z-depth-5 marginTop50'>" . "$parrafo->contenido" . "</div>";
    
}


?>




