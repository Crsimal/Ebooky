<?php


class ParrafosPublicados extends CActiveRecord
{

	public function tableName()
	{
		return 'parrafos_publicados';
	}

	public function rules()
	{
		return array(
			array('id_parrafo, id_historia', 'required'),
			array('id_parrafo, id_historia', 'numerical', 'integerOnly'=>true),
			array('id_parrafo, id_historia', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
                    'idparrafo'=>array(self::HAS_MANY, 'parrafos', 'id_parrafo'),
                    'idhistoria'=>array(self::HAS_ONE, 'historias', 'id_historia'),
                    
		);
	}

	public function attributeLabels()
	{
		return array(
	
			'id_parrafo' => 'Id Parrafo',
			'id_historia' => 'Id Historia',
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		
		$criteria->compare('id_parrafo',$this->id_parrafo);
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
