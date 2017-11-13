<?php

/**
 * This is the model class for table "subtipo_cuenta".
 *
 * The followings are the available columns in table 'subtipo_cuenta':
 * @property integer $ID_SUBTIPOCUENTA
 * @property integer $ID_TIPOCUENTA
 * @property string $NOMBRE_SUBTIPOCUENTA
 *
 * The followings are the available model relations:
 * @property Cuenta[] $cuentas
 * @property TipoCuenta $iDTIPOCUENTA
 */
class SubtipoCuenta extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'subtipo_cuenta';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ID_SUBTIPOCUENTA, ID_TIPOCUENTA', 'required'),
			array('ID_SUBTIPOCUENTA, ID_TIPOCUENTA', 'numerical', 'integerOnly'=>true),
			array('NOMBRE_SUBTIPOCUENTA', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID_SUBTIPOCUENTA, ID_TIPOCUENTA, NOMBRE_SUBTIPOCUENTA', 'safe', 'on'=>'search'),
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
			'cuentas' => array(self::HAS_MANY, 'Cuenta', 'ID_SUBTIPOCUENTA'),
			'iDTIPOCUENTA' => array(self::BELONGS_TO, 'TipoCuenta', 'ID_TIPOCUENTA'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_SUBTIPOCUENTA' => 'Id Subtipo cuenta',
			'ID_TIPOCUENTA' => 'Id Tipo cuenta',
			'NOMBRE_SUBTIPOCUENTA' => 'Nombre Subtipo cuenta',
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

		$criteria->compare('ID_SUBTIPOCUENTA',$this->ID_SUBTIPOCUENTA);
		$criteria->compare('ID_TIPOCUENTA',$this->ID_TIPOCUENTA);
		$criteria->compare('NOMBRE_SUBTIPOCUENTA',$this->NOMBRE_SUBTIPOCUENTA,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SubtipoCuenta the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
