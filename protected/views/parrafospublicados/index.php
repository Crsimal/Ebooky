<?php
/* @var $this ParrafospublicadosController */

$this->breadcrumbs = array(
    'Parrafospublicados',
);






foreach ($arrayParrafosMaxVotados as $parra) {
    ?>


    <div class='  parrafoVotacion z-depth-5 marginTop50'>

        <?php
        $titulo = Historias::model()->findByAttributes(array('id_historia' => $parra->id_historia));
        echo "<h5>Historia: " . $titulo->titulo . "</h5><br>";
        echo $parra->contenido . "<br><br>" ;
        ?>

        Votos: <?php echo $parra->votos; ?>
    </div>

    <?php
}
?>


