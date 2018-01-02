<?php

/**
 * This is the model class for table "cuenta".
 *
 * The followings are the available columns in table 'cuenta':
 * @property integer $ID_CUENTA
 * @property integer $ID_TIPOCUENTA
 * @property integer $ID_PLANCUENTA
 * @property integer $ID_SUBTIPOCUENTA
 * @property string $DESCRIPCION_CUENTA
 *
 * The followings are the available model relations:
 * @property SubtipoCuenta $iDSUBTIPOCUENTA
 * @property TipoCuenta $iDTIPOCUENTA
 * @property PlanCuenta $iDPLANCUENTA
 */
class Cuenta extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cuenta';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('CODIGO_CUENTA,ID_TIPOCUENTA, ID_PLANCUENTA, ID_SUBTIPOCUENTA', 'required'),
			array('ID_CUENTA, CODIGO_CUENTA, ID_TIPOCUENTA, ID_PLANCUENTA, ID_SUBTIPOCUENTA', 'numerical', 'integerOnly'=>true),
			array('DESCRIPCION_CUENTA', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID_CUENTA, CODIGO_CUENTA, ID_TIPOCUENTA, ID_PLANCUENTA, ID_SUBTIPOCUENTA, DESCRIPCION_CUENTA', 'safe', 'on'=>'search'),
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
			'iDSUBTIPOCUENTA' => array(self::BELONGS_TO, 'SubtipoCuenta', 'ID_SUBTIPOCUENTA'),
			'iDTIPOCUENTA' => array(self::BELONGS_TO, 'TipoCuenta', 'ID_TIPOCUENTA'),
			'iDPLANCUENTA' => array(self::BELONGS_TO, 'PlanCuenta', 'ID_PLANCUENTA'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			//'ID_CUENTA' => 'Codigo Cuenta',
			'CODIGO_CUENTA'=>'Codigo Cuenta',
			'ID_TIPOCUENTA' => 'Tipo cuenta',
			'ID_PLANCUENTA' => 'Plan cuenta',
			'ID_SUBTIPOCUENTA' => 'Subtipo cuenta',
			'DESCRIPCION_CUENTA' => 'Descripcion Cuenta',
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

		$criteria->compare('ID_CUENTA',$this->ID_CUENTA);
		$criteria->compare('CODIGO_CUENTA',$this->CODIGO_CUENTA);
		$criteria->compare('ID_TIPOCUENTA',$this->ID_TIPOCUENTA);
		$criteria->compare('ID_PLANCUENTA',$this->ID_PLANCUENTA);
		$criteria->compare('ID_SUBTIPOCUENTA',$this->ID_SUBTIPOCUENTA);
		$criteria->compare('DESCRIPCION_CUENTA',$this->DESCRIPCION_CUENTA,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Cuenta the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	/*Carga todas las cuentas de una empresa*/
	public function cargarCuentas($idPlan)
	{
		$sql='SELECT ID_SUBTIPOCUENTA,DESCRIPCION_CUENTA from Cuenta WHERE ID_PLANCUENTA='.$idPlan.'';
		$connection = Yii::app()->db;
        $command = $connection->createCommand($sql);
        $dataReader = $command->queryAll();
        return $dataReader;
	}
	public function cargarLibroDiario()
	{
		
	}
}
