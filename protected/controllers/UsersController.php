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
        	$model->attributes=$_POST['Users'];
                
                $criteria=new CDbCriteria;
                $criteria->select='max(id_usuario) AS id_usuario';
                $row = $model->model()->find($criteria);
                $somevariable = $row['id_usuario'];
                $somevariable=$somevariable + 1;
                
                $model->id_usuario=$somevariable;
                $model->ha_escrito=0;
                $model->ha_votado=0;
                

        	if($model->validate())
        	{
            	if($model->save())
            	{
            		$this->redirect(array('site/login'));
            	}
            	return;
        	}
    	}
    	$this->render('registro',array('model'=>$model));

	}

}
