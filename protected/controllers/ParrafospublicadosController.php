<?php

class ParrafospublicadosController extends Controller {

    public function actionIndex() {


        //array donde se guardaran los parrafos con mas votos
        $arrayParrafosMaxVotados = array();
        
        //recuperamos todas las historias
        $idhistorias = Historias::model()->findAll();

        foreach ($idhistorias as $id) {

            $criteria = new CDbCriteria;
            $criteria->condition = "votacionActual = 1 AND id_historia = $id->id_historia";
            $parrafos = Parrafos::model()->findAll($criteria);

            $MaxVotos = 0;
            $parrafoMaxVotos = NULL;

            if(!empty($parrafos)){
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
            
            //Funcion para añadir los daros a la tabla parrafos_publicados
            foreach ($arrayParrafosMaxVotados as $parrafoAñadir) {
                $parrafospublicados = new ParrafosPublicados;
                $criteria = new CDbCriteria;
               

                //guardamos los datos de la tabla parrafos_publicados
           
                $parrafospublicados->id_parrafo = $parrafoAñadir->id_parrafo;
                $parrafospublicados->id_historia = $parrafoAñadir->id_historia;
                $parrafospublicados->save();
            }
            
            
            $parrafosLimpiar = Parrafos::model()->findAllByAttributes(array('votacionActual' => 1));
            foreach($parrafosLimpiar as $limpiar){
                $limpiar->votacionActual = 0;
                $limpiar->publicado = 1;
                $limpiar->save();
            }
            //$delete = UsuarioHaEscritoEn::model()->deleteAll();
            
            $this->redirect(array('landing/index'));
        }

        $this->render('index', array('arrayParrafosMaxVotados' => $arrayParrafosMaxVotados));
    }

}
