<?php

/**
 * This is the model class for table "persona".
 *
 * The followings are the available columns in table 'persona':
 * @property string $RUT_PERSONA
 * @property string $NOMBRE_PERSONA
 * @property string $APELLIDO_PERSONA
 * @property integer $TELEFONO_PERSONA
 * @property string $CORREO_PERSONA
 *
 * The followings are the available model relations:
 * @property Usuario[] $usuarios
 */
class Persona extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'persona';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('RUT_PERSONA', 'required'),
			array('TELEFONO_PERSONA', 'numerical', 'integerOnly'=>true),
			array('RUT_PERSONA', 'length', 'max'=>12),
			array('NOMBRE_PERSONA, APELLIDO_PERSONA', 'length', 'max'=>20),
			array('CORREO_PERSONA', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('RUT_PERSONA, NOMBRE_PERSONA, APELLIDO_PERSONA, TELEFONO_PERSONA, CORREO_PERSONA', 'safe', 'on'=>'search'),
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
			'usuarios' => array(self::HAS_MANY, 'Usuario', 'RUT_PERSONA'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'RUT_PERSONA' => 'Rut Persona',
			'NOMBRE_PERSONA' => 'Nombre Persona',
			'APELLIDO_PERSONA' => 'Apellido Persona',
			'TELEFONO_PERSONA' => 'Telefono Persona',
			'CORREO_PERSONA' => 'Correo Persona',
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

		$criteria->compare('RUT_PERSONA',$this->RUT_PERSONA,true);
		$criteria->compare('NOMBRE_PERSONA',$this->NOMBRE_PERSONA,true);
		$criteria->compare('APELLIDO_PERSONA',$this->APELLIDO_PERSONA,true);
		$criteria->compare('TELEFONO_PERSONA',$this->TELEFONO_PERSONA);
		$criteria->compare('CORREO_PERSONA',$this->CORREO_PERSONA,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Persona the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
