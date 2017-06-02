<?php

class UsersController extends Controller
{

	/*public function actions()
	{
		// captcha action renders the CAPTCHA image displayed on the contact page
		return array(
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}
*/
	public function actionRegistro()
	{
		$model=new Users;

    	if(isset($_POST['ajax']) && $_POST['ajax']==='users-index-form')
    	{
        	echo CActiveForm::validate($model);
        	Yii::app()->end();
    	}

    	if(isset($_POST['Users']))
    	{
                //Guardamos los datos de registro del formulario en la base de datos
        	$model->attributes=$_POST['Users'];
                
                $criteria=new CDbCriteria;
                $criteria->select='max(id_usuario) AS id_usuario';
                $row = $model->model()->find($criteria);
                $control_id = $row['id_usuario'];
                $control_id=$control_id + 1;
                
                $model->id_usuario=$control_id;
                $model->historia_seleccionada=1;
                
                
                
                

        	if($model->validate())
        	{
            	if($model->save())
            	{
            		$this->redirect(array('users/login'));
            	}
            	return;
        	}
    	}
    	$this->render('registro',array('model'=>$model));

	}
        
        public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}
        
        public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
        
        public function actionPanelUsuario()
	{
            
            
                $users = new Users;
                $usuario = $users->findByAttributes(array("nickname" => Yii::app()->user->name));
                $user = Users::model()->findByPk($usuario->id_usuario);
                
                if(isset($_POST['Users'])){
                    var_dump($_POST['Users']);
                    $user->attributes=$_POST['Users'];
                    $user->id_usuario=$usuario->id_usuario;
                    $user->save();
                    
                    
                    
                }
                
                
		$this->render('panelUsuario',array('users'=>$users));
	}

}
