<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
?>

<div class="col s4 paddingTop50 center ">
   <img src="<?php echo Yii::app()->baseUrl . '/images'; ?>/votar.png" alt=""/>
</div>


<?php
/* @var $this SiteController */


$parrafos = $model->findAllByAttributes(array("votacionActual" => 1));
//$parrafos = $model->findAll();

foreach ($parrafos as $parrafo) {
    ?>

    <div class='  parrafoVotacion z-depth-5 marginTop50'>

        <?php echo $parrafo->contenido; ?>


        <form method="post">
            <input type="hidden" name="votado" value="<?php echo $parrafo->id_parrafo; ?>">
            <div class="row buttons center">
                <button class="btn waves-effect waves-light" type="submit" name="action">Votar</button>           
            </div>
        </form>
        Votos: <?php echo $parrafo->votos; ?>
    </div>

    <?php
}
?>

?>




