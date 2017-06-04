<?php


class Historias extends CActiveRecord {

    //Nombre de la tabla
    public function tableName() {
        return 'historias';
    }

    
    //Reglas de validacion de formulario
    public function rules() {
        return array(
            array('id_historia, titulo, limiteCaracteres, categoria', 'required'),
            array('id_historia, limiteCaracteres', 'numerical', 'integerOnly' => true),
            array('titulo', 'length', 'max' => 30),
            array('categoria', 'length', 'max' => 20),
            array('id_historia, titulo, limiteCaracteres, categoria', 'safe', 'on' => 'search'),
        );
    }


    public function relations() {
        return array(
        );
    }

    //Etiquetas de los atributos
    public function attributeLabels() {
        return array(
            'id_historia' => 'Id Historia',
            'titulo' => 'Titulo',
            'limiteCaracteres' => 'Limite Caracteres',
            'categoria' => 'Categoria',
            'terminada' => 'Terminada',
        );
    }

    public function search() {

        $criteria = new CDbCriteria;

        $criteria->compare('id_historia', $this->id_historia);
        $criteria->compare('titulo', $this->titulo, true);
        $criteria->compare('limiteCaracteres', $this->limiteCaracteres);
        $criteria->compare('categoria', $this->categoria, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
