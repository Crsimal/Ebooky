<?php

class AccionesController extends Controller {

    //Accion de leer historias
    public function actionLeer() {

        //Si el usuario no esta conectado restringimos el acceso
        if (Yii::app()->user->isGuest) {
            $this->render('accesoRestringido');
        } else {
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
    }

    //Accion para la seleccion de historia
    public function actionSeleccion() {

        //Historias
        $model = new Historias;

        //Si el usuario es invitado restringimos el acceso
        if (Yii::app()->user->isGuest) {
            $this->render('accesoRestringido');
        } else {
            //Si ha pulsado una historia para seleccionarla, modificamos la seleccion en la tabla del usuario    
            if (isset($_POST['seleccionado'])) {
                $usuarios = new Users;
                $usuario = $usuarios->findByAttributes(array("nickname" => Yii::app()->user->name));
                $usuario->historia_seleccionada = $_POST['seleccionado'];
                $usuario->save();
                $this->redirect(array('landing/index'));
            } else {
                //Si no se han hecho acciones mostramos la página de seleccionar historia
                $this->render('seleccion', array('model' => $model));
            }
        }
    }

    public function actionEscribir() {

        //Parrafos
        $model = new Parrafos;

        //Usuarios
        $usuarios = new Users();

        //Guardamos el usuario que está conectado
        $usuario = $usuarios->findByAttributes(array("nickname" => Yii::app()->user->name));

        //SI el usuario no está conectado restringimos el acceso
        if (Yii::app()->user->isGuest) {
            $this->render('accesoRestringido');
        }
        //Si esta conectado
        else {

            //Llamamos a la tabla UsuarioHaEscritoEn para saber si el usuario ya ha escrito en esta historia
            $criteria = new CDbCriteria;
            $criteria->condition = "id_usuario = $usuario->id_usuario AND id_historia = $usuario->historia_seleccionada";
            $models = UsuarioHaEscritoEn::model()->findAll($criteria);

            //Si ya ha escrito 
            if (!empty($models)) {
                $this->render('yaEscrito', array('palabraAccion' => 'escrito'));
            }
            //Si no ha escrito
            else {
                if (isset($_POST['parrafo'])) {
                    
                    //ID incremental, PENDIENTE MEJORAR
                    $criteria = new CDbCriteria;
                    $criteria->select = 'max(id_parrafo) AS id_parrafo';
                    $row = $model->model()->find($criteria);
                    $somevariable = $row['id_parrafo'];
                    $somevariable = $somevariable + 1;
                    
                    //Guardamos los datos del párrafo
                    $model->contenido = $_POST['parrafo'];
                    $model->id_usuario = $usuario->id_usuario;
                    $model->id_parrafo = $somevariable;
                    $model->votos = 0;
                    $model->votacionActual = 1;
                    $model->publicado = 0;
                    $model->id_historia = $usuario->historia_seleccionada;    
                    $model->save();
     
                    //Cuando el usuario escribe se añade un registro a la tabla de control de escritura
                    $usuarioHaEscritoEn = new UsuarioHaEscritoEn;

                    //Guardamos el usuario y la historia
                    $usuarioHaEscritoEn->id_historia = $usuario->historia_seleccionada;
                    $usuarioHaEscritoEn->id_usuario = $usuario->id_usuario;

                    //ID incremental, PENDIENTE MEJORAR
                    $criteria = new CDbCriteria;
                    $criteria->select = 'max(id) AS id';
                    $row = $usuarioHaEscritoEn->model()->find($criteria);
                    $control_id = $row['id'];
                    $control_id = $control_id + 1;

                    //Guardamos el ID
                    $usuarioHaEscritoEn->id = $control_id;

                    //Guardamos datos
                    $usuarioHaEscritoEn->save();

                    //Redirigimos al index
                    $this->redirect(array('landing/index'));
                } else {
                    $this->render('escribir', array('model' => $model));
                }
            }
        }
    }

    public function actionVotar() {

        //parrafos
        $model = new Parrafos;

        //guardamos el usuario que está conectado
        $usuarios = new Users();
        $usuario = $usuarios->findByAttributes(array("nickname" => Yii::app()->user->name));

        //si no esta conectado restringimos el acceso
        if (Yii::app()->user->isGuest) {
            $this->render('accesoRestringido');
        //si esta conectado
        } else {

            //consultamos la tabla para comprobar si ha votado en esta historia
            $criteria = new CDbCriteria;
            $criteria->condition = "id_usuario = $usuario->id_usuario AND id_historia = $usuario->historia_seleccionada";
            $models = UsuarioHaVotadoEn::model()->findAll($criteria);

            //Si ya ha votaado
            if (!empty($models)) {
                $this->render('yaEscrito', array('palabraAccion' => 'votado'));
            //Si no ha votado
            } else {
                //Si pulsa el voton de votar
                if (isset($_POST['votado'])) {
                    //sumamos un voto
                    $parrafo = $model->findByAttributes(array("id_parrafo" => $_POST['votado']));
                    $sumaVoto = $parrafo->votos + 1;
                    $parrafo->votos = $sumaVoto;
                    $parrafo->save();                                   

                    //modificamos la tabla de acciones de usuario indicando que ya ha votado
                    $usuarios = new Users();
                    $usuario = $usuarios->findByAttributes(array("nickname" => Yii::app()->user->name));

                    //indicamos que ya ha votado en esta historia en la tabla de control
                    $usuarioHaVotadoEn = new UsuarioHaVotadoEn;

                    $usuarioHaVotadoEn->id_historia = $usuario->historia_seleccionada;
                    $usuarioHaVotadoEn->id_usuario = $usuario->id_usuario;

                    //ID incremental, PENDIENTE MEJORAR
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
