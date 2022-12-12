<?php

/**
 * This is the model class for table "geo_nielssen".
 *
 * The followings are the available columns in table 'geo_nielssen':
 * @property string $codigo_nielssen
 * @property string $grupo
 * @property string $cadena
 * @property integer $id_rotulo
 * @property string $abrev
 * @property string $direccion
 * @property string $numero
 * @property string $provincia
 * @property string $municipio
 * @property string $cp
 * @property integer $cajas
 * @property integer $cajas_scan
 * @property integer $sala_ventas
 * @property string $apertura
 * @property string $ccomercial
 * @property integer $ccaa
 * @property integer $tipo
 * @property string $geom
 * @property string $fecha_baja
 * @property integer $geo_precision
 *
 * The followings are the available model relations:
 * @property TblHiperAlcampo[] $tblHiperAlcampos
 * @property TblRotulo $idRotulo
 * @property TblTipoEstab $tipo0
 * @property TblPrecision $geoPrecision
 * @property TblCodigoMkt[] $tblCodigoMkts
 */
class GeoNielssen extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return GeoNielssen the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'geo_nielssen';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('codigo_nielssen', 'required'),
			array('id_rotulo, cajas, cajas_scan, sala_ventas, ccaa, tipo, geo_precision', 'numerical', 'integerOnly'=>true),
			array('grupo, cadena, abrev, direccion, numero, provincia, municipio, cp, apertura, ccomercial, geom, fecha_baja', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('codigo_nielssen, grupo, cadena, id_rotulo, abrev, direccion, numero, provincia, municipio, cp, cajas, cajas_scan, sala_ventas, apertura, ccomercial, ccaa, tipo, geom, fecha_baja, geo_precision', 'safe', 'on'=>'search'),
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
			'tblHiperAlcampos' => array(self::HAS_MANY, 'TblHiperAlcampo', 'cod_nielssen'),
			'idRotulo' => array(self::BELONGS_TO, 'TblRotulo', 'id_rotulo'),
			'tipo0' => array(self::BELONGS_TO, 'TblTipoEstab', 'tipo'),
			'geoPrecision' => array(self::BELONGS_TO, 'TblPrecision', 'geo_precision'),
			'tblCodigoMkts' => array(self::HAS_MANY, 'TblCodigoMkt', 'nielssen'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'codigo_nielssen' => 'Codigo Nielssen',
			'grupo' => 'Grupo',
			'cadena' => 'Cadena',
			'id_rotulo' => 'Id Rotulo',
			'abrev' => 'Abrev',
			'direccion' => 'Direccion',
			'numero' => 'Numero',
			'provincia' => 'Provincia',
			'municipio' => 'Municipio',
			'cp' => 'Cp',
			'cajas' => 'Cajas',
			'cajas_scan' => 'Cajas Scan',
			'sala_ventas' => 'Sala Ventas',
			'apertura' => 'Apertura',
			'ccomercial' => 'Ccomercial',
			'ccaa' => 'Ccaa',
			'tipo' => 'Tipo',
			'geom' => 'Geom',
			'fecha_baja' => 'Fecha Baja',
			'geo_precision' => 'Geo Precision',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('codigo_nielssen',$this->codigo_nielssen,true);
		$criteria->compare('grupo',$this->grupo,true);
		$criteria->compare('cadena',$this->cadena,true);
		$criteria->compare('id_rotulo',$this->id_rotulo);
		$criteria->compare('abrev',$this->abrev,true);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('numero',$this->numero,true);
		$criteria->compare('provincia',$this->provincia,true);
		$criteria->compare('municipio',$this->municipio,true);
		$criteria->compare('cp',$this->cp,true);
		$criteria->compare('cajas',$this->cajas);
		$criteria->compare('cajas_scan',$this->cajas_scan);
		$criteria->compare('sala_ventas',$this->sala_ventas);
		$criteria->compare('apertura',$this->apertura,true);
		$criteria->compare('ccomercial',$this->ccomercial,true);
		$criteria->compare('ccaa',$this->ccaa);
		$criteria->compare('tipo',$this->tipo);
		$criteria->compare('geom',$this->geom,true);
		$criteria->compare('fecha_baja',$this->fecha_baja,true);
		$criteria->compare('geo_precision',$this->geo_precision);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}