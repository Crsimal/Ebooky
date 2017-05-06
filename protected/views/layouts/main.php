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
                        <a href="#!" class="brand-logo center">Ebooky</a>
                        <ul class="left hide-on-med-and-down">
                            <li><a href="sass.html">Inicio</a></li>
                            <li><a href="badges.html">Leer</a></li>
                            <li><a href="badges.html">Votar</a></li>
                            <li><a href="badges.html">Escribir</a></li>
                            <li><a href="badges.html">About</a></li>
                        </ul>
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

    </body>
</html>
