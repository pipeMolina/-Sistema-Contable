<?php

/**
 * This is the model class for table "usuario".
 *
 * The followings are the available columns in table 'usuario':
 * @property string $RUT_PERSONA
 * @property string $ID_TIPOUSUARIO
 * @property string $LOGIN_USUARIO
 * @property string $PASS_USUARIO
 *
 * The followings are the available model relations:
 * @property Persona $rUTPERSONA
 * @property TipoUsuario $iDTIPOUSUARIO
 */
class Usuario extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'usuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('RUT_PERSONA, ID_TIPOUSUARIO', 'required'),
			array('RUT_PERSONA', 'length', 'max'=>12),
			array('ID_TIPOUSUARIO', 'length', 'max'=>2),
			array('LOGIN_USUARIO', 'length', 'max'=>20),
			array('PASS_USUARIO', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('RUT_PERSONA, ID_TIPOUSUARIO, LOGIN_USUARIO, PASS_USUARIO', 'safe', 'on'=>'search'),
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
			'rUTPERSONA' => array(self::BELONGS_TO, 'Persona', 'RUT_PERSONA'),
			'iDTIPOUSUARIO' => array(self::BELONGS_TO, 'TipoUsuario', 'ID_TIPOUSUARIO'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'RUT_PERSONA' => 'Rut',
			'ID_TIPOUSUARIO' => 'Tipo',
			'LOGIN_USUARIO' => 'Login',
			'PASS_USUARIO' => 'Contraseña',
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
		$criteria->compare('ID_TIPOUSUARIO',$this->ID_TIPOUSUARIO,true);
		$criteria->compare('LOGIN_USUARIO',$this->LOGIN_USUARIO,true);
		$criteria->compare('PASS_USUARIO',$this->PASS_USUARIO,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Usuario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function validatePassword($password)
	{
		return $this->hashPassword($password)===$this->PASS_USUARIO;
	}
 
	public function hashPassword($password)
	{
		return md5($password);
	}
}
