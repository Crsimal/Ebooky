<?php

class ParrafospublicadosController extends Controller {

    public function accessRules() {
        return array(
            array('allow', 
                'actions' => array('index', 'view'),
                'users' => array('admin'),
            ),
            array('deny', 
                'users' => array('*'),
            ),
        );
    }

    public function actionIndex() {


        //array donde se guardaran los parrafos con mas votos
        $arrayParrafosMaxVotados = array();

        //recuperamos todas las historias
        $idhistorias = Historias::model()->findAll();

        //Por cada historia que exista
        foreach ($idhistorias as $id) {

            //seleccionamos los párrafos que estén en votacion y pertenezcan a la historia
            $criteria = new CDbCriteria;
            $criteria->condition = "votacionActual = 1 AND id_historia = $id->id_historia";
            $parrafos = Parrafos::model()->findAll($criteria);

            $MaxVotos = 0;
            $parrafoMaxVotos = NULL;

            //Vamos guardando en el array el párrafo que más votos tenga de cada historia
            if (!empty($parrafos)) {
                foreach ($parrafos as $votos) {
                    if ($votos->votos >= $MaxVotos) {
                        $parrafoMaxVotos = $votos;
                        $MaxVotos = $votos->votos;
                    }    
                }
                $arrayParrafosMaxVotados[] = $parrafoMaxVotos;
            }
        }

        //Si pulsamos el boton de añadir
        if (isset($_POST['añadir'])) {

            //Funcion para añadir los párrafos a la tabla parrafos_publicados
            foreach ($arrayParrafosMaxVotados as $parrafoAñadir) {
                $parrafospublicados = new ParrafosPublicados;
                $criteria = new CDbCriteria;

                //guardamos los datos de la tabla parrafos_publicados
                $parrafospublicados->id_parrafo = $parrafoAñadir->id_parrafo;
                $parrafospublicados->id_historia = $parrafoAñadir->id_historia;
                $parrafospublicados->save();
              
                //Cambiamos el párrafo a estado publicado
                $publicado = Parrafos::model()->findByPk($parrafoAñadir->id_parrafo);
                $publicado->publicado=1;
                $publicado->save();   
            }

            //Quitamos todos los párrados del modo de votación
            $parrafosLimpiar = Parrafos::model()->findAllByAttributes(array('votacionActual' => 1));
            foreach ($parrafosLimpiar as $limpiar) {
                $limpiar->votacionActual = 0;
                $limpiar->save();
            }
            
            //Dejamos a todos los usuarios volver a escribir
            $delete = UsuarioHaEscritoEn::model()->deleteAll();
            
            //Dejamos a todos los usuarios volver a votar
            $delete = UsuarioHaVotadoEn::model()->deleteAll();

            $this->redirect(array('landing/index'));
        }

        $this->render('index', array('arrayParrafosMaxVotados' => $arrayParrafosMaxVotados));
    }

}
