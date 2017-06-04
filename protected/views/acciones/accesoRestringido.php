<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<!--Vista acceso restringido -->
<div class=" center">
         <img src="<?php echo Yii::app()->baseUrl.'/images';?>/login.png" alt="book"/>
      </div>
<div class="center">
    ¡Oops! Parece que estás intentando acceder a una zona para usuarios registrados. Inicia sesión o registrate ahora.</br></br>
    <a href='index.php?r=users/login' class='waves-effect waves-light btn blue z-dept-5'>Conectarse</a></br></br></br>
    <a href="index.php?r=users/registro" class="waves-effect waves-light btn blue z-dept-5">Registrarse</a>
</div>