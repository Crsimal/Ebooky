<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id_usuario
 * @property string $name
 * @property string $surname
 * @property string $password
 * @property string $city
 * @property string $email
 * @property string $nickname
 */
class Users extends CActiveRecord {

    public $repeatpassword;

    public function tableName() {
        return 'users';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, surname, password, city, email, nickname', 'required'),
            array('', 'numerical', 'integerOnly' => true),
            array('name, surname', 'length', 'max' => 18),
            array('password, city', 'length', 'max' => 20),
            array('email', 'length', 'max' => 40),
            array('nickname', 'length', 'max' => 45),
            array('email', 'email'),
            array('email, nickname', 'unique'),

            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id_usuario, name, surname, password, city, email, nickname', 'safe', 'on' => 'search'),
            array('repeatpassword', 'compare', 'compareAttribute' => 'password', 'message' => "Las contraseñas no coinciden"),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
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

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

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

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Users the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
