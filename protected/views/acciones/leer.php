<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;




?>


<div class="col s4 center paddingTop50">
    <img src="<?php echo Yii::app()->baseUrl . '/images'; ?>/leer.png" alt="book"/>
</div>


<div class="container z-depth-5 " id="historia">
    <div class="row">
    <div class="chip col s6 offset-s3 center">
        Párrafos restantes en esta historia: <?php echo $parrafosRestantes ?>
    </div>
    </div>
    <h3 class="center"><?php echo $historia->titulo; ?></h1>
        <?php
        $parrafos = ParrafosPublicados::model()->with('idparrafo')->findAllByAttributes(array('id_historia' => $usuario->historia_seleccionada));
        $parra = new Parrafos;

        $parrafosMostrar = array();
        foreach ($parrafos as $parrafo) {
            $parrafosMostrar [] = $parrafo->id_parrafo;
        }

        foreach ($parrafosMostrar as $muestra) {
            $parrafoMostrado = $parra->findByPk($muestra);
            echo $parrafoMostrado->contenido;
            echo "<br><br>";
        }



        /*
          foreach ($parrafos as $parrafo) {
          foreach ($parrafo->idparrafo as $contenido) {
          echo $contenido->contenido;
          echo "<br><br>";
          }
          }
         * */


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