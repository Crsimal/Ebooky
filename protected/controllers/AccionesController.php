<?php

class AccionesController extends Controller {

    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionLeer() {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $this->render('leer');
    }

    public function actionEscribir() {

        $model = new Parrafos;

        if (Yii::app()->user->isGuest) {
            $this->render('accesoRestringido');
        } else {

            if (isset($_POST['parrafo'])) {

                $usuarios = new Users();
                $modelo = $usuarios->findByAttributes(array("nickname" => Yii::app()->user->name));

                $criteria = new CDbCriteria;
                $criteria->select = 'max(id_parrafo) AS id_parrafo';
                $row = $model->model()->find($criteria);
                $somevariable = $row['id_parrafo'];
                $somevariable = $somevariable + 1;



                $model->contenido = $_POST['parrafo'];
                $model->id_usuario = $modelo->id_usuario;
                $model->id_parrafo = $somevariable;
                $model->votos = 0;
                $model->votacionActual = 1;
                $model->save();
                /*
                  $model->attributes = $_POST['Users'];

                  $criteria = new CDbCriteria;
                  $criteria->select = 'max(id_usuario) AS id_usuario';
                  $row = $model->model()->find($criteria);
                  $somevariable = $row['id_usuario'];
                  $somevariable = $somevariable + 1;

                  $model->id_usuario = $somevariable;
                  $model->ha_escrito = 0;
                  $model->ha_votado = 0;
                 */
            }


            $this->render('escribir', array('model' => $model));
        }
    }

    public function actionVotar() {
        
        $model = new Parrafos;
        
        if(isset($_POST['votado'])){
            echo $_POST['votado'];
            $parrafo = $model->findByAttributes(array("id_parrafo" => $_POST['votado']));
            $sumaVoto = $parrafo->votos + 1;
            echo $sumaVoto;
            $parrafo->votos = $sumaVoto;
            $parrafo->save();
            
        }
        
        if (Yii::app()->user->isGuest) {
            $this->render('accesoRestringido');
        } else {
            $usuarios = new Users();
                $modelo = $usuarios->findByAttributes(array("nickname" => Yii::app()->user->name));
            
        
        $this->render('votar', array('model' => $model));
        }
    }

}
