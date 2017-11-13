<?php

/**
 * This is the model class for table "plan_cuenta".
 *
 * The followings are the available columns in table 'plan_cuenta':
 * @property integer $ID_PLANCUENTA
 * @property string $DESCRIPCION_PLANCUENTA
 *
 * The followings are the available model relations:
 * @property Cuenta[] $cuentas
 * @property Empresa[] $empresas
 */
class PlanCuenta extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'plan_cuenta';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ID_PLANCUENTA', 'numerical', 'integerOnly'=>true),
			array('DESCRIPCION_PLANCUENTA', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID_PLANCUENTA, DESCRIPCION_PLANCUENTA', 'safe', 'on'=>'search'),
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
			'cuentas' => array(self::HAS_MANY, 'Cuenta', 'ID_PLANCUENTA'),
			'empresas' => array(self::HAS_MANY, 'Empresa', 'ID_PLANCUENTA'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_PLANCUENTA' => 'Id Plan de Cuenta',
			'DESCRIPCION_PLANCUENTA' => 'Descripcion Plan de Cuenta',
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

		$criteria->compare('ID_PLANCUENTA',$this->ID_PLANCUENTA);
		$criteria->compare('DESCRIPCION_PLANCUENTA',$this->DESCRIPCION_PLANCUENTA,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PlanCuenta the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
