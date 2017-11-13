<?php

/**
 * This is the model class for table "ciudad".
 *
 * The followings are the available columns in table 'ciudad':
 * @property integer $ID_CIUDAD
 * @property integer $ID_REGION
 * @property string $NOMBRE_CIUDAD
 *
 * The followings are the available model relations:
 * @property Region $iDREGION
 * @property Empresa[] $empresas
 */
class Ciudad extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ciudad';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ID_CIUDAD, ID_REGION', 'required'),
			array('ID_CIUDAD, ID_REGION', 'numerical', 'integerOnly'=>true),
			array('NOMBRE_CIUDAD', 'length', 'max'=>25),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID_CIUDAD, ID_REGION, NOMBRE_CIUDAD', 'safe', 'on'=>'search'),
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
			'iDREGION' => array(self::BELONGS_TO, 'Region', 'ID_REGION'),
			'empresas' => array(self::HAS_MANY, 'Empresa', 'ID_CIUDAD'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_CIUDAD' => 'Id Ciudad',
			'ID_REGION' => 'Id Region',
			'NOMBRE_CIUDAD' => 'Nombre Ciudad',
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

		$criteria->compare('ID_CIUDAD',$this->ID_CIUDAD);
		$criteria->compare('ID_REGION',$this->ID_REGION);
		$criteria->compare('NOMBRE_CIUDAD',$this->NOMBRE_CIUDAD,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Ciudad the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
