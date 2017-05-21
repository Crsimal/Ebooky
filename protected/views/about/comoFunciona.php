<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
?>

<div class="container" >

    <div class="row" id="about">
        <div class="col s4"><img src="<?php echo Yii::app()->baseUrl . '/images'; ?>/construct.png"></div>
        <div class="col s8">¡Bienvenido a Ebooky! </br></br> Ebooky es una aplicación web donde crear una historia escrita entre varias personas, con la peculiaridad de que los usuarios son anónimos. No podrán contactar entre ellos, no podrán ponerse deacuerdo ni acordar qué va a pasar en la historia. Haz clic en el desplegable para ver que puedes hacer en Ebooky.</div>
    </div>

    <ul class="collapsible" data-collapsible="accordion">
        <li>
            <div class="collapsible-header"><span class="badge"></span>Escribir</div>
            <div class="collapsible-body"><p>La parte más importante de Ebooky, la escritura. Cada usuario de Ebooky podrá escribir un párrafo al día</p></div>
        </li>
        <li>
            <div class="collapsible-header"><span class="badge"></span>Leer</div>
            <div class="collapsible-body"><p>Todos los visitantes de Ebooky podrán leer la historia creada</p></div>
        </li>
        <li>
            <div class="collapsible-header"><span class="badge"></span>Votar</div>
            <div class="collapsible-body"><p>Los usuarios podrán votar los párrafos para ser añadidos a la historia</p></div>
        </li>
    </ul>

</div>