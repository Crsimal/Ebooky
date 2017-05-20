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

        $model = new Historia;




        $this->render('leer', array('model' => $model));
    }

    public function actionEscribir() {

        $model = new Parrafos;

        $usuarios = new Users();
        $usuario = $usuarios->findByAttributes(array("nickname" => Yii::app()->user->name));

        if (Yii::app()->user->isGuest) {
            $this->render('accesoRestringido');
        } else {
            $acciones = Users::model()->with('acciones')->findByPk($usuario->id_usuario);
            $accion = $acciones->acciones;
            if ($accion->ha_escrito == 1) {
                $this->render('yaEscrito');
            } else {
                if (isset($_POST['parrafo'])) {
                    $criteria = new CDbCriteria;
                    $criteria->select = 'max(id_parrafo) AS id_parrafo';
                    $row = $model->model()->find($criteria);
                    $somevariable = $row['id_parrafo'];
                    $somevariable = $somevariable + 1;

                    $model->contenido = $_POST['parrafo'];
                    $model->id_usuario = $usuario->id_usuario;
                    $model->id_parrafo = $somevariable;
                    $model->votos = 0;
                    $model->votacionActual = 1;
                    $model->publicado = 0;

                    //Cuando el usuario escribe se modifica la tabla de acciones indicandolo

                    $accion->ha_escrito = 1;
                    $accion->save();
                    $model->save();
                    $this->redirect(array('landing/index'));
                }else{
                $this->render('escribir', array('model' => $model));
                }
            }
        }
    }

    public function actionVotar() {

        $model = new Parrafos;

        $usuarios = new Users();
        $usuario = $usuarios->findByAttributes(array("nickname" => Yii::app()->user->name));
        
        if (Yii::app()->user->isGuest) {
            $this->render('accesoRestringido');
        } else {
        
        $acciones = Users::model()->with('acciones')->findByPk($usuario->id_usuario);
        $accion = $acciones->acciones;
        if ($accion->ha_votado == 1) {
            $this->render('yaEscrito');
        }else{

        if (isset($_POST['votado'])) {
            //sumamos un voto
            $parrafo = $model->findByAttributes(array("id_parrafo" => $_POST['votado']));
            $sumaVoto = $parrafo->votos + 1;
            $parrafo->votos = $sumaVoto;
            $parrafo->save();

            //modificamos la tabla de acciones de usuario indicando que ya ha votado
            $usuarios = new Users();
            $usuario = $usuarios->findByAttributes(array("nickname" => Yii::app()->user->name));
            $acciones = Users::model()->with('acciones')->findByPk($usuario->id_usuario);
            $accion = $acciones->acciones;
            $accion->ha_votado = 1;
            $accion->save();
            $this->redirect(array('landing/index'));
        }
        else{
            $this->render('votar', array('model' => $model));
        }
        }
    }
    }
}
