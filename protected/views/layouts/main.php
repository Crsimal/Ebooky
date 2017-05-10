<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="language" content="en">

        <!--[if lt IE 8]>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">
        <![endif]-->

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ebooky.css">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">

        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>

    <body>

        <div>

            <div id="">
                <nav>
                    <div class="nav-wrapper z-depth-5 blue lighten-3">
                        <a href="#!" class="brand-logo center"><img src="<?php echo Yii::app()->baseUrl . '/images'; ?>/logo.png" alt="" id="logo"/></a>
                        <a href="#" data-activates="mobile-demo" class="button-collapse">Menu</a>
                        <ul class="left hide-on-med-and-down">
                            <li><a href="index.php?r=landing/index">Inicio</a></li>
                            <li><a href="index.php?r=acciones/leer">Leer</a></li>
                            <li><a href="index.php?r=acciones/votar">Votar</a></li>
                            <li><a href="index.php?r=acciones/escribir">Escribir</a></li>
                            <li><a href="index.php?r=about/index">About</a></li>
                        </ul>

                        <ul class="right hide-on-med-and-down opcionesUsuario">                         
                            <?php 
                            if (Yii::app()->user->isGuest){
                                echo "<li><a href='index.php?r=users/login' class='waves-effect waves-light btn blue z-dept-5'>Conectarse</a></li>";
                            }else{
                                echo "<li>Conectado como <strong>" . Yii::app()->user->name . "</strong></li>";
                                echo "<li><a href='index.php?r=users/logout' class='waves-effect waves-light btn blue z-dept-5'>Desconectarse</a></li>";
                            }                      
                            ?> 
                            <li><a href="index.php?r=users/registro" class="waves-effect waves-light btn blue z-dept-5">Registrarse</a></li>
                        </ul>
                        <ul class="side-nav" id="mobile-demo">
                            <li><a href="sass.html">Sass</a></li>
                            <li><a href="badges.html">Components</a></li>
                            <li><a href="collapsible.html">Javascript</a></li>
                            <li><a href="mobile.html">Mobile</a></li>
                        </ul>
                    </div>
            </div>
        </nav>
    </div>

    <div class="container" id="menuPrincipal">

        <?php echo $content; ?>
    </div><!-- mainmenu -->




    <div class="clear"></div>

    <div id="footer">
        Copyright &copy; <?php echo date('Y'); ?> Ebooky<br/>
        All Rights Reserved.<br/>
    </div><!-- footer -->

</div><!-- page -->

<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>

<script type="text/javascript" src="<?php echo Yii::app()->baseUrl.'/js/main.js';?>"></script>
<?php 
/*
$usuarios = new Users();

$modelo = $usuarios->findByAttributes(array("nickname"=>Yii::app()->user->name));

var_dump($modelo->id_usuario);
*/
?>
</body>
</html>
