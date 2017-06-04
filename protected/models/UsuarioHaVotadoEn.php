<?php


class UsuarioHaVotadoEn extends CActiveRecord
{

	public function tableName()
	{
		return 'usuario_ha_votado_en';
	}

	public function rules()
	{
		return array(
			array('id, id_usuario, id_historia', 'required'),
			array('id, id_usuario, id_historia', 'numerical', 'integerOnly'=>true),
			array('id, id_usuario, id_historia', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_usuario' => 'Id Usuario',
			'id_historia' => 'Id Historia',
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('id_usuario',$this->id_usuario);
		$criteria->compare('id_historia',$this->id_historia);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
             
}
