<?php

class ParrafosController extends Controller
{
    
	public $layout='//layouts/column2';

	public function filters()
	{
		return array(
			'accessControl', 
		);
	}

	public function accessRules()
	{
		return array(
			array('allow',  
				'actions'=>array('index','view'),
				'users'=>array('admin'),
			),
			array('allow', 
				'actions'=>array('create','update'),
				'users'=>array('admin'),
			),
			array('allow',
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  
				'users'=>array('*'),
			),
		);
	}

	
      
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	//Crear nuevos parrafos
	public function actionCreate()
	{
		$model=new Parrafos;
                
		if(isset($_POST['Parrafos']))
		{
			$model->attributes=$_POST['Parrafos'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_parrafo));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	//Actualizar parrafos
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		if(isset($_POST['Parrafos']))
		{
			$model->attributes=$_POST['Parrafos'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_parrafo));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

        //Elininar parrafos
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Parrafos');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

        //Panel admin
	public function actionAdmin()
	{
		$model=new Parrafos('search');
		$model->unsetAttributes(); 
		if(isset($_GET['Parrafos']))
			$model->attributes=$_GET['Parrafos'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function loadModel($id)
	{
		$model=Parrafos::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='parrafos-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
