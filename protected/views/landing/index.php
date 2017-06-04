<!-- --------------------------------------- -->
<!-- --------------------------------------- -->
<!-- PAGINA PRINCIPAL -->
<!-- --------------------------------------- -->
<!-- --------------------------------------- -->


<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;


if (!Yii::app()->user->isGuest) {
    
    //Recuperamos la historia seleccionada
    $usuarios = new Users;
    $usuario = $usuarios->findByAttributes(array("nickname" => Yii::app()->user->name));
    $historia = $usuario->historia_seleccionada;
    $historias = new Historias();
    $seleccion = $historias->findByPk($historia);
    ?>

    <div class="col s4 center ">
        <div class="row">
            <div class="col s12 m6 offset-m3">
                <div class="card blue lighten-3 z-depth-5">
                    <div class="card-content white-text">
                        <span class="card-title">Historia seleccionada: <strong><?php echo $seleccion->titulo ?></strong></span>
                        <p>Las acciones de leer, votar y escribir se aplicarán a la historia que tengas seleccionada.</p>
                    </div>
                    <div class="card-action">
                        <a href='index.php?r=acciones/seleccion' class='waves-effect waves-light btn blue z-dept-5'>Cambiar seleccion</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>
<hr>

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




