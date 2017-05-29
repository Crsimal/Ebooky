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

        //usuarios e historias
        $usuarios = new Users();
        $historias = new Historias();

        //usuario conectado
        $usuario = $usuarios->findByAttributes(array("nickname" => Yii::app()->user->name));

        //historia seleccionada
        $historia = $historias->findByAttributes(array("id_historia" => $usuario->historia_seleccionada));


        //parrafos restantes
        $numeroParrafos = ParrafosPublicados::model()->countByAttributes(array('id_historia' => $usuario->historia_seleccionada));
        $parrafosRestantes = $historia->limiteCaracteres - $numeroParrafos;

        //si es invitado restringimos acceso, si no, reenderizamos la vista
        if (Yii::app()->user->isGuest) {
            $this->render('accesoRestringido');
        } else {
            $this->render('leer', array('usuario' => $usuario, 'historias' => $historias, 'parrafosRestantes' => $parrafosRestantes, 'historia' => $historia));
        }
    }

    public function actionSeleccion() {

        $model = new Historias;

        if (Yii::app()->user->isGuest) {
            $this->render('accesoRestringido');
        } else {
            if (isset($_POST['seleccionado'])) {
                $usuarios = new Users;
                $usuario = $usuarios->findByAttributes(array("nickname" => Yii::app()->user->name));
                $usuario->historia_seleccionada = $_POST['seleccionado'];
                $usuario->save();
                $this->redirect(array('landing/index'));
            } else {
                $this->render('seleccion', array('model' => $model));
            }
        }
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

            $criteria = new CDbCriteria;
            $criteria->condition = "id_usuario = $usuario->id_usuario AND id_historia = $usuario->historia_seleccionada";
            $models = UsuarioHaEscritoEn::model()->findAll($criteria);

            if (!empty($models)) {

                $this->render('yaEscrito', array('palabraAccion' => 'escrito'));
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
                    $model->id_historia = $usuario->historia_seleccionada;

                    //Cuando el usuario escribe se modifica la tabla de acciones indicandolo

                    $accion->ha_escrito = 1;
                    $accion->save();
                    $model->save();

                    $usuarioHaEscritoEn = new UsuarioHaEscritoEn;
                 
                    $usuarioHaEscritoEn->id_historia = $usuario->historia_seleccionada;
                    $usuarioHaEscritoEn->id_usuario = $usuario->id_usuario;
                    
                    $criteria = new CDbCriteria;
                    $criteria->select = 'max(id) AS id';
                    $row = $usuarioHaEscritoEn->model()->find($criteria);
                    $control_id = $row['id'];
                    $control_id = $control_id + 1;

                    $usuarioHaEscritoEn->id = $control_id;
                    
                    $usuarioHaEscritoEn->save();

                    $this->redirect(array('landing/index'));
                } else {
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

            $criteria = new CDbCriteria;
            $criteria->condition = "id_usuario = $usuario->id_usuario AND id_historia = $usuario->historia_seleccionada";
            $models = UsuarioHaVotadoEn::model()->findAll($criteria);

            if (!empty($models)) {
                $this->render('yaEscrito', array('palabraAccion' => 'votado'));
            } else {

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


                    //indicamos que ya ha votado en esta historia en la tabla de control


                    

                    $usuarioHaVotadoEn = new UsuarioHaVotadoEn;
                    
                    $usuarioHaVotadoEn->id_historia = $usuario->historia_seleccionada;
                    $usuarioHaVotadoEn->id_usuario = $usuario->id_usuario;

                    $criteria = new CDbCriteria;
                    $criteria->select = 'max(id) AS id';
                    $row = $usuarioHaVotadoEn->model()->find($criteria);
                    $control_id = $row['id'];
                    $control_id = $control_id + 1;

                    $usuarioHaVotadoEn->id = $control_id;

                    $usuarioHaVotadoEn->save();



                    $this->redirect(array('landing/index'));
                } else {
                    $this->render('votar', array('model' => $model, 'usuario' => $usuario));
                }
            }
        }
    }

}
