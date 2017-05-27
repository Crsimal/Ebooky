<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;

$historia = $historias->findByAttributes(array("id_historia" => $usuario->historia_seleccionada));
?>


<div class="col s4 center paddingTop50">
    <img src="<?php echo Yii::app()->baseUrl . '/images'; ?>/leer.png" alt="book"/>
</div>


<div class="container z-depth-5" id="historia">
    <h3 class="center"><?php echo $historia->titulo; ?></h1>
        <?php
        $parrafos = ParrafosPublicados::model()->with('idparrafo')->findAllByAttributes(array('id_historia' => $usuario->historia_seleccionada));

        foreach ($parrafos as $parrafo) {
            foreach ($parrafo->idparrafo as $contenido) {
                echo $contenido->contenido;
                echo "<br><br>";
            }
        }

        /*
          foreach($parrafos as $parrafo){
          foreach($parrafo->idparrafo as $contenido){
          echo $contenido->contenido;
          echo "<br><br>";
          }
          }
         */
        ?>
</div>