<?php

class AboutController extends Controller
{     
        //Accion que llama al manual de usuario
        public function actionComoFunciona()
	{
		$this->render('comoFunciona');
	}
}