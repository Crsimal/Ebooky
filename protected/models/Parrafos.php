<?php

/**
 * This is the model class for table "parrafos".
 *
 * The followings are the available columns in table 'parrafos':
 * @property integer $id_parrafo
 * @property string $contenido
 * @property integer $id_usuario
 */
class Parrafos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'parrafos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_parrafo, contenido, id_usuario', 'required'),
			array('id_parrafo, id_usuario, votos', 'numerical', 'integerOnly'=>true),
			array('contenido', 'length', 'max'=>3000),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_parrafo, contenido, id_usuario', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
                    'id_parrafo'=>array(self::HAS_MANY, 'parrafospublicados', 'id_parrafo'),
                   
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
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
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_parrafo',$this->id_parrafo);
		$criteria->compare('contenido',$this->contenido,true);
		$criteria->compare('id_usuario',$this->id_usuario);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Parrafos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
