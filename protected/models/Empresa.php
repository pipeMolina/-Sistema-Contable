<?php
include 'funcorreo.php';
include 'funnombre.php';
/**
 * This is the model class for table "empresa".
 *
 * The followings are the available columns in table 'empresa':
 * @property integer $ID_EMPRESA
 * @property string $RUT_EMPRESA
 * @property integer $ID_CIUDAD
 * @property integer $ID_PLANCUENTA
 * @property string $RAZONSOCIAL_EMPRESA
 * @property string $GIRO_EMPRESA
 * @property string $TELEFONO_EMPRESA
 * @property string $CORREO
 *
 * The followings are the available model relations:
 * @property ComprobanteContable[] $comprobanteContables
 * @property PlanCuenta $iDPLANCUENTA
 * @property Ciudad $iDCIUDAD
 */
class Empresa extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'empresa';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('RUT_EMPRESA, ID_CIUDAD, ID_PLANCUENTA', 'required'),
			array('ID_CIUDAD, ID_PLANCUENTA', 'numerical', 'integerOnly'=>true),
			array('RUT_EMPRESA', 'length', 'max'=>12),
			array('RAZONSOCIAL_EMPRESA, GIRO_EMPRESA, CORREO', 'length', 'max'=>50),
			array('TELEFONO_EMPRESA', 'length', 'max'=>15),
			array('RUT_EMPRESA', 'validateRut'),
			array('CORREO','valCorreo'),
			array('RAZONSOCIAL_EMPRESA','valName'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array(' RUT_EMPRESA, ID_CIUDAD, ID_PLANCUENTA, RAZONSOCIAL_EMPRESA, GIRO_EMPRESA, TELEFONO_EMPRESA, CORREO', 'safe', 'on'=>'search'),
		);
	}

	public function valName($atributo,$params)
	{
		if(nombrevalido($this->RAZONSOCIAL_EMPRESA)==false)
			$this->addError('RAZONSOCIAL_EMPRESA','Nombre Invalido');
	}

	public function valCorreo($atributo,$params)
	{
		if(comprobar_email($this->CORREO)==false)
			$this->addError('CORREO','Correo Invalido');
	}

	public function validateRut($attribute, $params) 
	{
        $data = explode('-', $this->RUT_EMPRESA);
        $evaluate = strrev($data[0]);
        $multiply = 2;
        $store = 0;
        for ($i = 0; $i < strlen($evaluate); $i++) {
            $store += $evaluate[$i] * $multiply;
            $multiply++;
            if ($multiply > 7)
                $multiply = 2;
        }
        isset($data[1]) ? $verifyCode = strtolower($data[1]) : $verifyCode = '';
        $result = 11 - ($store % 11);
        if ($result == 10)
            $result = 'k';
        if ($result == 11)
            $result = 0;
        if ($verifyCode != $result)
            $this->addError('RUT_EMPRESA', 'Rut inválido.');
    }

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'comprobanteContables' => array(self::HAS_MANY, 'ComprobanteContable', 'RUT_EMPRESA'),
			'iDPLANCUENTA' => array(self::BELONGS_TO, 'PlanCuenta', 'ID_PLANCUENTA'),
			'iDCIUDAD' => array(self::BELONGS_TO, 'Ciudad', 'ID_CIUDAD'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'RUT_EMPRESA' => 'Rut Empresa',
			'ID_CIUDAD' => 'Ciudad',
			'ID_PLANCUENTA' => 'Plan de cuenta',
			'RAZONSOCIAL_EMPRESA' => 'Razón Social Empresa',
			'GIRO_EMPRESA' => 'Giro Empresa',
			'TELEFONO_EMPRESA' => 'Telefono Empresa',
			'CORREO' => 'Correo Empresa',
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

		$criteria->compare('RUT_EMPRESA',$this->RUT_EMPRESA,true);
		$criteria->compare('ID_CIUDAD',$this->ID_CIUDAD);
		$criteria->compare('ID_PLANCUENTA',$this->ID_PLANCUENTA);
		$criteria->compare('RAZONSOCIAL_EMPRESA',$this->RAZONSOCIAL_EMPRESA,true);
		$criteria->compare('GIRO_EMPRESA',$this->GIRO_EMPRESA,true);
		$criteria->compare('TELEFONO_EMPRESA',$this->TELEFONO_EMPRESA,true);
		$criteria->compare('CORREO',$this->CORREO,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Empresa the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

}
