<?php
/* @var $this ParrafospublicadosController */

$this->breadcrumbs = array(
    'Parrafospublicados',
);

//Mostramos el párrafo más votado de cada historia
foreach ($arrayParrafosMaxVotados as $parra) {
    ?>


    <div class='  parrafoVotacion z-depth-5 marginTop50'>

        <?php
        $titulo = Historias::model()->findByAttributes(array('id_historia' => $parra->id_historia));
        echo "<h5>Historia: " . $titulo->titulo . "</h5><br>";
        echo $parra->contenido . "<br><br>";
        ?>

        Votos: <?php echo $parra->votos; ?>

    </div>

    <?php
}
?>

<br><br>
<form method="post">
    <input type="hidden" name="añadir" value="añadir">
    <div class="row buttons center">
        <button class="btn waves-effect waves-light" type="submit" name="action">Añadir párrafos</button>           
    </div>
</form>