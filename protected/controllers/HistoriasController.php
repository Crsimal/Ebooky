<?php

class HistoriasController extends Controller
{

	public $layout='//layouts/column2';

	public function filters()
	{
		return array(
			'accessControl', // Control de acceso 
		);
	}

	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','create','update','admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
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

	public function actionCreate()
	{
		$model=new Historias;
                //Si se ha rellenado el formulario
		if(isset($_POST['Historias']))
		{
                    //Guardamos los datos introducidos
			$model->attributes=$_POST['Historias'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_historia));
		}
                //Llamamos a la vista del formulario de crear
		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		if(isset($_POST['Historias']))
		{
			$model->attributes=$_POST['Historias'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_historia));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Historias');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function actionAdmin()
	{
		$model=new Historias('search');
		$model->unsetAttributes(); 
		if(isset($_GET['Historias']))
			$model->attributes=$_GET['Historias'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function loadModel($id)
	{
		$model=Historias::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='historias-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
