<?php

/**
 * This is the model class for table "parrafos_publicados".
 *
 * The followings are the available columns in table 'parrafos_publicados':
 * @property integer $id
 * @property integer $id_parrafo
 * @property integer $id_historia
 */
class ParrafosPublicados extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'parrafos_publicados';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_parrafo, id_historia', 'required'),
			array('id_parrafo, id_historia', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_parrafo, id_historia', 'safe', 'on'=>'search'),
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
                    'idparrafo'=>array(self::HAS_MANY, 'parrafos', 'id_parrafo'),
                    'idhistoria'=>array(self::HAS_ONE, 'historias', 'id_historia'),
                    
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
	
			'id_parrafo' => 'Id Parrafo',
			'id_historia' => 'Id Historia',
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
		$criteria->compare('id_historia',$this->id_historia);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ParrafosPublicados the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
