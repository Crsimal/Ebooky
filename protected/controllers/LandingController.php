<?php

class LandingController extends Controller{

        //llamamos a la vista de la página principal
	public function actionIndex()
	{
		$this->render('index');
	}

}