<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
?>

<!--Manual de usuario - Página COMO FUNCIONA -->
<div class="container" >

    <div class="row" id="about">
        <div class="col s4"><img src="<?php echo Yii::app()->baseUrl . '/images'; ?>/construct.png"></div>
        <div class="col s8"><h4>¡Bienvenido a Ebooky!</h4> </br></br> Ebooky es una aplicación web de entretenimiento donde podrás crear historias junto con otros visitantes anónimos. El funcionamiento de Ebooky consiste en enviar párrafos a las historias existentes, los cuales serán sometidos a votación y, al final del día, aquellos que cuenten con mas votos serán agregados a las historias. De este forma se irán componiendo varias historias de forma simultánea gracías a los párrafos enviados por los usuarios.<br><br>
            ¿Te ha gustado la idea? Si es así, sigue las siguientes acciones para empezar a usar Ebooky!
        </div>
    </div>

    <ul class="collapsible" data-collapsible="accordion">
        <li>
            <div class="collapsible-header left-align"><span class="badge"></span>¿Por donde empiezo?</div>
            <div class="collapsible-body center-align">
                <div class=" center">
                    <img src="<?php echo Yii::app()->baseUrl . '/images'; ?>/login.png" alt="book"/>
                </div>
                <p>Lo primero de todo para poder usar Ebooky es estar registrado y conectado. Si no tienes una cuenta puedes crearla desde aquí.</p>
                <br>
                <a href='index.php?r=users/registro' class='waves-effect waves-light btn blue z-dept-5 '>Registrarse</a>
                <br><br>
                Si ya cuentas con una cuenta, pulsa aquí para conectarte.
                <br><br>
                <a href='index.php?r=users/login' class='waves-effect waves-light btn blue z-dept-5'>Conectarse</a> 
            </div>
        </li>
        <li>
            <div class="collapsible-header left-align"><span class="badge"></span>Seleccionar historia</div>
            <div class="collapsible-body center-align">
                <div class="col s4 center paddingTop50">
                    <img src="<?php echo Yii::app()->baseUrl . '/images'; ?>/seleccion.png" alt="book"/>
                </div><p>Ebooky cuenta con varias historias simultáneas. En la página principal o en el menú de seleccionar historia podrás elegir una. Cuando accedas a las secciones de leer, escribir o votar, todo esto se aplicará a la historia que tengas seleccionada en ese instante. Puedes cambiar tu seleccion en cualquier momento.</p>
                <br> 
                <a href='index.php?r=acciones/seleccion' class='waves-effect waves-light btn blue z-dept-5 '>Seleccionar historia</a>
                <br>
            </div>
        </li>
        <li>
            <div class="collapsible-header left-align"><span class="badge"></span>Escribir</div>
            <div class="collapsible-body center-align">
                <div class="col s4 center paddingTop50">
                    <img src="<?php echo Yii::app()->baseUrl . '/images'; ?>/escribir.png" alt=""/>
                </div>
                <p>La parte más importante de Ebooky, la escritura. Cada usuario de Ebooky podrá escribir un párrafo por día e historia. Es decir, si envías un párrafo a una historia no podrás volver a escribir en ella hasta el día siguiente, pero si en las demás. La participación en las historias está limitada a una vez por usuario, esto quiere decir que puedes enviar párrafos todos los días, pero una vez tu párrafo salga elegido y forme parte de una historia no podrás volver a escribir en ella.</p>
                <br><br>
                Para enviar un párrafo a tu historia seleccionada pulsa el siguiente botón:
                <br><br>
                <a href='index.php?r=acciones/escribir' class='waves-effect waves-light btn blue z-dept-5'>Enviar un párrafo</a> 
            </div>
        </li>
        <li>
            <div class="collapsible-header left-align"><span class="badge"></span>Votar</div>
            <div class="collapsible-body center-align">
                <div class="col s4 paddingTop50 center ">
                    <img src="<?php echo Yii::app()->baseUrl . '/images'; ?>/votar.png" alt=""/>
                </div>
                <p>Ebooky funciona mediante votos, es decir, los usuarios enviarán sus párrafos y serán añadidos a un panel de votación. Al final del día, el párrafo que más votos tenga es el que será añadido a cada historia. Puedes votar todos los párrafos menos los tuyos, los cuales puedes borrar cuando quieras desde el panel de votación para enviar uno nuevo si has cambiado de opinión.</p>
                <br>
                Ten en cuenta que solo puedes votar una vez cada historia al día. Cuando votes un párrafo de una historia no podrás acceder a su panel de votación, pero sí al de las demas historias.
                <br><br>
                <a href='index.php?r=acciones/votar' class='waves-effect waves-light btn blue z-dept-5'>Votar párrafos</a> 
            </div>
        </li>
        <li>
            <div class="collapsible-header left-align"><span class="badge"></span>Leer</div>
            <div class="collapsible-body center-align">
                <div class="col s4 center paddingTop50">
                    <img src="<?php echo Yii::app()->baseUrl . '/images'; ?>/leer.png" alt="book"/>
                </div>
                <p>La otra tarea más importante de Ebooky, la lectura. Desde la página de leer podrás ver como van las historias, recuerda que se añade un párrafo al día a cada una, siempre y cuando alguien haya escrito en ella.</p>
                <br>
                <a href='index.php?r=acciones/leer' class='waves-effect waves-light btn blue z-dept-5'>Leer historias</a> 
            </div>
        </li>
        <li>
            <div class="collapsible-header left-align"><span class="badge"></span>Día Ebooky</div>
            <div class="collapsible-body center-align">
                <div class="col s4 center paddingTop50">
                    <img src="<?php echo Yii::app()->baseUrl . '/images'; ?>/leer.png" alt="book"/>
                </div>
                <p>Llamamos un día de Ebooky al periodo en el cual los usuarios envían sus textos para ser añadidos a las historias y votan los párrafos de los demás. Una vez termina el día, el párrafo con mas votos se añade a cada historia, los paneles de votación se limpian para empezar a recibir nuevos párrafos y los usuarios pueden volver a votar y escribir en las historias de nuevo.</p>
                <br>
            </div>
        </li>
    </ul>

</div>