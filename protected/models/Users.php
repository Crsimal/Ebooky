<?php


class Users extends CActiveRecord {

    public $repeatpassword;

    public function tableName() {
        return 'users';
    }


    public function rules() {
        return array(
            array('name, surname, password, city, email, nickname', 'required'),
            array('', 'numerical', 'integerOnly' => true),
            array('name, surname', 'length', 'max' => 18),
            array('password, city', 'length', 'max' => 20),
            array('email', 'length', 'max' => 40),
            array('nickname', 'length', 'max' => 45),
            array('email', 'email'),
            array('email, nickname', 'unique'),
            array('id_usuario, name, surname, password, city, email, nickname', 'safe', 'on' => 'search'),
            array('repeatpassword', 'compare', 'compareAttribute' => 'password', 'message' => "Las contraseñas no coinciden"),
        );
    }

    public function relations() {
        return array(
        );
    }

    public function attributeLabels() {
        return array(
            'id_usuario' => 'Id Usuario',
            'name' => 'Name',
            'surname' => 'Surname',
            'password' => 'Password',
            'city' => 'City',
            'email' => 'Email',
            'nickname' => 'Nickname',
            'historia_seleccionada' => 'historia_seleccionada',
        );
    }


    public function search() {

        $criteria = new CDbCriteria;

        $criteria->compare('id_usuario', $this->id_usuario);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('surname', $this->surname, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('city', $this->city, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('nickname', $this->nickname, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }


    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
