<?php

class Parrafos extends CActiveRecord
{

	public function tableName()
	{
		return 'parrafos';
	}


	public function rules()
	{
		return array(
			array('id_parrafo, contenido, id_usuario', 'required'),
			array('id_parrafo, id_usuario, votos', 'numerical', 'integerOnly'=>true),
			array('contenido', 'length', 'max'=>3000),
			array('id_parrafo, contenido, id_usuario', 'safe', 'on'=>'search'),
		);
	}


	public function relations()
	{
		return array(
                    'id_parrafo'=>array(self::HAS_MANY, 'parrafospublicados', 'id_parrafo'),
                   
		);
	}

	public function attributeLabels()
	{
		return array(
			'id_parrafo' => 'Id Parrafo',
			'contenido' => 'Contenido',
			'id_usuario' => 'Id Usuario',
                        'votos' => 'votos',
                        'votacionActual' => 'votacionActual',
                        'publicado' => 'publicado',
		);
	}


	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id_parrafo',$this->id_parrafo);
		$criteria->compare('contenido',$this->contenido,true);
		$criteria->compare('id_usuario',$this->id_usuario);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
