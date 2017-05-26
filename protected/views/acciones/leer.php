<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
?>


<div class="col s4 center paddingTop50">
    <img src="<?php echo Yii::app()->baseUrl . '/images'; ?>/leer.png" alt="book"/>
</div>


<div class="container z-depth-5" id="historia">
    <h3 class="center">Bienvenido a Ebooky</h1>
    <?php
   
    $parrafos = $model->findAllByAttributes(array("id_historia" => $usuario->historia_seleccionada));
    
    foreach ($parrafos as $parrafo){
        echo $parrafo->contenido;
        echo "</br></br>";
    }
    
    
    
    
    ?>
</div>