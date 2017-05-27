<?php

class ParrafospublicadosController extends Controller {

    public function actionIndex() {

        $arrayParrafosMaxVotados = array();

        $idhistorias = Historias::model()->findAll();

        foreach ($idhistorias as $id) {

            $criteria = new CDbCriteria;
            $criteria->condition = "votacionActual = 1 AND id_historia = $id->id_historia";
            $parrafos = Parrafos::model()->findAll($criteria);

            $MaxVotos = 0;
            $parrafoMaxVotos = NULL;

            foreach ($parrafos as $votos) {
                if ($votos->votos > $MaxVotos) {
                    $parrafoMaxVotos = $votos;
                    $MaxVotos = $votos->votos;
                }
            }
            $arrayParrafosMaxVotados[] = $parrafoMaxVotos;
        }

        $this->render('index', array('arrayParrafosMaxVotados' => $arrayParrafosMaxVotados));
    }


}
