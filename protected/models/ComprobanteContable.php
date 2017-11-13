<?php

/**
 * This is the model class for table "comprobante_contable".
 *
 * The followings are the available columns in table 'comprobante_contable':
 * @property integer $NUMERO_COMPROBANTE
 * @property integer $ID_TIPOCOMP
 * @property string $RUT_EMPRESA
 * @property string $FECHA_COMPROBANTE
 * @property string $GLOSA_COMPROBANTE
 *
 * The followings are the available model relations:
 * @property AsientoContable[] $asientoContables
 * @property TipoComprobante $iDTIPOCOMP
 * @property Empresa $rUTEMPRESA
 */
class ComprobanteContable extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'comprobante_contable';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ID_TIPOCOMP, RUT_EMPRESA', 'required'),
			array('ID_TIPOCOMP', 'numerical', 'integerOnly'=>true),
			array('RUT_EMPRESA', 'length', 'max'=>12),
			array('GLOSA_COMPROBANTE', 'length', 'max'=>50),
			array('FECHA_COMPROBANTE', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('NUMERO_COMPROBANTE, ID_TIPOCOMP, RUT_EMPRESA, FECHA_COMPROBANTE, GLOSA_COMPROBANTE', 'safe', 'on'=>'search'),
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
			'lineacontable' => array(self::HAS_MANY, 'LineaContable', 'NUMERO_COMPROBANTE'),
			'iDTIPOCOMP' => array(self::BELONGS_TO, 'TipoComprobante', 'ID_TIPOCOMP'),
			'rUTEMPRESA' => array(self::BELONGS_TO, 'Empresa', 'RUT_EMPRESA'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'NUMERO_COMPROBANTE' => 'Numero Comprobante',
			'ID_TIPOCOMP' => 'Id Tipocomp',
			'RUT_EMPRESA' => 'Rut Empresa',
			'FECHA_COMPROBANTE' => 'Fecha Comprobante',
			'GLOSA_COMPROBANTE' => 'Glosa Comprobante',
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

		$criteria->compare('NUMERO_COMPROBANTE',$this->NUMERO_COMPROBANTE);
		$criteria->compare('ID_TIPOCOMP',$this->ID_TIPOCOMP);
		$criteria->compare('RUT_EMPRESA',$this->RUT_EMPRESA,true);
		$criteria->compare('FECHA_COMPROBANTE',$this->FECHA_COMPROBANTE,true);
		$criteria->compare('GLOSA_COMPROBANTE',$this->GLOSA_COMPROBANTE,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ComprobanteContable the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
