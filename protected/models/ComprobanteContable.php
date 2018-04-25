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
			'ID_TIPOCOMP' => 'Tipo',
			'RUT_EMPRESA' => 'Rut Empresa',
			'FECHA_COMPROBANTE' => 'Fecha',
			'GLOSA_COMPROBANTE' => 'Glosa',
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
	/*Carga todos los comprobantes contables segun el filtro del reporte Libro Diario*/
	public function cargarComprobantes($cadena)
	{
		$sql='SELECT DISTINCT e.razonsocial_empresa,cc.numero_comprobante,DAY(cc.fecha_comprobante) AS dia,MONTH(cc.fecha_comprobante) AS mes,YEAR(cc.fecha_comprobante) AS Año,tc.nombre_tipocomp,lc.cuenta,c.descripcion_cuenta,cc.glosa_comprobante,lc.debe,lc.haber
 				FROM COMPROBANTE_CONTABLE AS cc
 				INNER JOIN LINEA_CONTABLE AS lc ON cc.NUMERO_COMPROBANTE=lc.NUMERO_COMPROBANTE
                INNER JOIN EMPRESA AS e ON cc.RUT_EMPRESA=e.RUT_EMPRESA
                INNER JOIN TIPO_COMPROBANTE AS tc ON cc.ID_TIPOCOMP=tc.ID_TIPOCOMP
                INNER JOIN PLAN_CUENTA AS pc ON e.id_plancuenta=pc.id_plancuenta
                INNER JOIN CUENTA AS c ON lc.cuenta=c.codigo_cuenta
 				'.$cadena.' ORDER BY numero_comprobante,debe DESC';
 		$connection = Yii::app()->db;
        $command = $connection->createCommand($sql);
        $dataReader = $command->queryAll();
        
        return $dataReader;
	}
	/*Consultar el ultimo Comprobante ingresado*/
	public function cargaUltimoComprobante()
	{
		$sql = 'SELECT MAX(NUMERO_COMPROBANTE) AS numero_comprobante FROM comprobante_contable';
		$connection = Yii::app()->db;
        $command = $connection->createCommand($sql);
        $dataReader = $command->queryAll();
        
        return $dataReader;
	}
	/*Carga Comprobantes por cuenta segun año, consulta diseñada para la vista libroMayor*/
	public function cargarComprobantesCuenta($cadena)
	{
		$sql = 'SELECT DISTINCT  e.razonsocial_empresa,lc.cuenta,c.descripcion_cuenta,DAY(cc.fecha_comprobante) AS dia,MONTH(cc.fecha_comprobante) AS mes,YEAR(cc.fecha_comprobante) AS Año,cc.numero_comprobante,tc.nombre_tipocomp,cc.glosa_comprobante,lc.debe,lc.haber
 				FROM COMPROBANTE_CONTABLE AS cc 
 				INNER JOIN LINEA_CONTABLE AS lc ON cc.NUMERO_COMPROBANTE=lc.NUMERO_COMPROBANTE
                INNER JOIN TIPO_COMPROBANTE AS tc ON cc.ID_TIPOCOMP=tc.ID_TIPOCOMP
                INNER JOIN EMPRESA AS e ON cc.RUT_EMPRESA=e.RUT_EMPRESA
                INNER JOIN PLAN_CUENTA AS pc ON e.id_plancuenta=pc.id_plancuenta
                INNER JOIN CUENTA AS c ON lc.cuenta=c.codigo_cuenta
                '.$cadena.' order by MONTH(cc.fecha_comprobante),DAY(cc.fecha_comprobante)';

        $connection = Yii::app()->db;
        $command = $connection->createCommand($sql);
        $dataReader = $command->queryAll();

        return $dataReader;
	}
	/*Carga todas las cuentas anualmente, consulta diseñada para la vista Balance8Columnas*/
	public function cargaCuentasBalance($cadena)
	{
		$sql='SELECT DISTINCT  e.razonsocial_empresa,DAY(cc.fecha_comprobante) AS dia,MONTH(cc.fecha_comprobante) AS mes,YEAR(cc.fecha_comprobante) AS Año,tc.nombre_tipocomp,lc.cuenta,c.descripcion_cuenta,lc.debe,lc.haber
 				FROM COMPROBANTE_CONTABLE AS cc 
 				INNER JOIN LINEA_CONTABLE AS lc ON cc.NUMERO_COMPROBANTE=lc.NUMERO_COMPROBANTE
                INNER JOIN TIPO_COMPROBANTE AS tc ON cc.ID_TIPOCOMP=tc.ID_TIPOCOMP
                INNER JOIN EMPRESA AS e ON cc.RUT_EMPRESA=e.RUT_EMPRESA
                INNER JOIN PLAN_CUENTA AS pc ON e.id_plancuenta=pc.id_plancuenta
                INNER JOIN CUENTA AS c ON lc.cuenta=c.codigo_cuenta
                '.$cadena.' ORDER BY cuenta;';

        $connection = Yii::app()->db;
        $command = $connection->createCommand($sql);
        $dataReader = $command->queryAll();

        return $dataReader;
	}
	/*Carga cuentas de perdida y Ganancia de un año, consulta diseñada para la vista Estado Resultado*/
	public function cargaCuentasEstadoResultado($cadena)
	{
		$sql='SELECT DISTINCT e.razonsocial_empresa,cc.numero_comprobante,DAY(cc.fecha_comprobante) AS dia,MONTH(cc.fecha_comprobante) AS mes,YEAR(cc.fecha_comprobante) AS Año,tc.nombre_tipocomp,tcuenta.ID_TIPOCUENTA,lc.cuenta,c.descripcion_cuenta,cc.glosa_comprobante,lc.debe,lc.haber
 				FROM COMPROBANTE_CONTABLE AS cc
                INNER JOIN LINEA_CONTABLE AS lc ON cc.NUMERO_COMPROBANTE=lc.NUMERO_COMPROBANTE
                INNER JOIN EMPRESA AS e ON cc.RUT_EMPRESA=e.RUT_EMPRESA
                INNER JOIN TIPO_COMPROBANTE AS tc ON cc.ID_TIPOCOMP=tc.ID_TIPOCOMP
                INNER JOIN PLAN_CUENTA AS pc ON e.id_plancuenta=pc.id_plancuenta
                INNER JOIN CUENTA AS c ON lc.cuenta=c.codigo_cuenta
                INNER JOIN TIPO_CUENTA AS tcuenta ON c.ID_TIPOCUENTA=tcuenta.ID_TIPOCUENTA
                '.$cadena.' AND tcuenta.ID_TIPOCUENTA BETWEEN 30000000 AND 40000000 ORDER BY cuenta;';

        $connection = Yii::app()->db;
        $command = $connection->createCommand($sql);
        $dataReader = $command->queryAll();

        return $dataReader;
	}
}
