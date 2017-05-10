<?php

/**
 * This is the model class for table "historia".
 *
 * The followings are the available columns in table 'historia':
 * @property integer $id_posicion_parrafo
 * @property integer $id_parrafo
 */
class Historia extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'historia';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_posicion_parrafo, id_parrafo', 'required'),
			array('id_posicion_parrafo, id_parrafo', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_posicion_parrafo, id_parrafo', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
	
		return array(
                     'relacion'=>array(self::BELONGS_TO, 'parrafos', 'id_parrafo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_posicion_parrafo' => 'Id Posicion Parrafo',
			'id_parrafo' => 'Id Parrafo',
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

		$criteria->compare('id_posicion_parrafo',$this->id_posicion_parrafo);
		$criteria->compare('id_parrafo',$this->id_parrafo);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Historia the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
