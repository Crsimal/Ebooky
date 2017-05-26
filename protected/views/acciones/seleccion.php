<?php
$usuarios = new Users;
$usuario = $usuarios->findByAttributes(array("nickname" => Yii::app()->user->name));
$historias = $model->findAll();



?>

<div class="col s4 center paddingTop50">
    <img src="<?php echo Yii::app()->baseUrl . '/images'; ?>/seleccion.png" alt="book"/>
</div>
<div class=''>      

    <?php foreach ($historias as $historia) { ?>

        <form method="post">

            <input type="hidden" name="seleccionado" value="<?php echo $historia->id_historia; ?>">
            <div class="row buttons center">
                <button class="btn waves-effect waves-light" type="submit" name="action"><?php echo $historia->titulo; ?></button>           
            </div>

        </form>
    
    <?php } ?>
</div>
