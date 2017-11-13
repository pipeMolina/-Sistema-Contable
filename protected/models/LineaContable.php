<?php

/**
 * This is the model class for table "linea_contable".
 *
 * The followings are the available columns in table 'linea_contable':
 * @property integer $ID_LINEACONTABLE
 * @property integer $NUMERO_COMPROBANTE
 * @property integer $DEBE
 * @property integer $HABER
 * @property string $CUENTA
 *
 * The followings are the available model relations:
 * @property ComprobanteContable $nUMEROCOMPROBANTE
 */
class LineaContable extends CActiveRecord
{

	 /**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'linea_contable';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('NUMERO_COMPROBANTE', 'required'),
			array('NUMERO_COMPROBANTE, DEBE, HABER', 'numerical', 'integerOnly'=>true),
			array('CUENTA', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID_LINEACONTABLE, NUMERO_COMPROBANTE, DEBE, HABER, CUENTA', 'safe', 'on'=>'search'),
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
			'nUMEROCOMPROBANTE' => array(self::BELONGS_TO, 'ComprobanteContable', 'NUMERO_COMPROBANTE'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_LINEACONTABLE' => 'Id Lineacontable',
			'NUMERO_COMPROBANTE' => 'Numero Comprobante',
			'DEBE' => 'Debe',
			'HABER' => 'Haber',
			'CUENTA' => 'Cuenta',
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

		$criteria->compare('ID_LINEACONTABLE',$this->ID_LINEACONTABLE);
		$criteria->compare('NUMERO_COMPROBANTE',$this->NUMERO_COMPROBANTE);
		$criteria->compare('DEBE',$this->DEBE);
		$criteria->compare('HABER',$this->HABER);
		$criteria->compare('CUENTA',$this->CUENTA,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return LineaContable the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
