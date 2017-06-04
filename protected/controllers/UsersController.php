<?php

class UsersController extends Controller {

    
    //Registro de usuario
    public function actionRegistro() {
        $model = new Users;

        if (isset($_POST['ajax']) && $_POST['ajax'] === 'users-index-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        
        //Si se ha enviado el formulario
        if (isset($_POST['Users'])) {
            //Guardamos los datos de registro del formulario en la base de datos
            $model->attributes = $_POST['Users'];
            
            //ID Incremental, pendiente mejorar
            $criteria = new CDbCriteria;
            $criteria->select = 'max(id_usuario) AS id_usuario';
            $row = $model->model()->find($criteria);
            $control_id = $row['id_usuario'];
            $control_id = $control_id + 1;
            $model->id_usuario = $control_id;
            $model->historia_seleccionada = 1;

            //Si valida el formulario se guarda el usuario
            if ($model->validate()) {
                if ($model->save()) {
                    $this->redirect(array('users/login'));
                }
                return;
            }
        }
        $this->render('registro', array('model' => $model));
    }

    
    //Accion para loguearse
    public function actionLogin() {
        $model = new LoginForm;

        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        //Si se envia el formulario
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // Si los datos son correctos hace login y redirige a la pagina en la que estaba
            if ($model->validate() && $model->login())
                $this->redirect(Yii::app()->user->returnUrl);
        }
        //Formulario de login
        $this->render('login', array('model' => $model));
    }

    //Funcion logout
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    
    //Panel para modificar datos o eliminar el usuario
    public function actionPanel() {

        $users = new Users;

        $usuario = $users->findByAttributes(array("nickname" => Yii::app()->user->name));
        $model = $users->findByPk($usuario->id_usuario);

        if (isset($_POST['ajax']) && $_POST['ajax'] === 'users-index-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        if (isset($_POST['Users'])) {
            
            //Guardamos los datos de registro del formulario en la base de datos
            $model->attributes = $_POST['Users'];
            if ($model->validate()) {
                if ($model->update()) {
                    $this->redirect(array('users/login'));
                }
                return;
            }          
        } 
        //Si s epulsa el boton de eliminar usuario lo borramos de la base de datos
        else if (isset($_POST['elimina'])) {
            Yii::app()->user->logout();

            $eliminar = Users::model()->findByPk($_POST['eliminar']);
            $eliminar->delete();
            $this->redirect(Yii::app()->homeUrl);
        }
        $this->render('panel', array('model' => $model, 'usuario' => $usuario));
    }

}
