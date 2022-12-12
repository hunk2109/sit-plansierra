<?php

/**
 * This is the model class for table "tbl_hiper_alcampo".
 *
 * The followings are the available columns in table 'tbl_hiper_alcampo':
 * @property integer $id_hiper_alcampo
 * @property string $cod_nielssen
 * @property string $nombre
 * @property integer $region
 *
 * The followings are the available model relations:
 * @property GeoNielssen $codNielssen
 * @property TblIdEncuesta[] $tblIdEncuestas
 * @property TblZonaInfluencia[] $tblZonaInfluencias
 * @property GeoIsolines[] $geoIsolines
 * @property GeoIsopolygon[] $geoIsopolygons
 * @property TblIdEncuestaZc[] $tblIdEncuestaZcs
 */
class TblHiperAlcampo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TblHiperAlcampo the static model class
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
		return 'tbl_hiper_alcampo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_hiper_alcampo', 'required'),
			array('id_hiper_alcampo, region', 'numerical', 'integerOnly'=>true),
			array('cod_nielssen, nombre', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_hiper_alcampo, cod_nielssen, nombre, region', 'safe', 'on'=>'search'),
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
			'codNielssen' => array(self::BELONGS_TO, 'GeoNielssen', 'cod_nielssen'),
			'tblIdEncuestas' => array(self::HAS_MANY, 'TblIdEncuesta', 'id_alcampo'),
			'tblZonaInfluencias' => array(self::HAS_MANY, 'TblZonaInfluencia', 'id_hiper_alcampo'),
			'geoIsolines' => array(self::HAS_MANY, 'GeoIsolines', 'id_hiper'),
			'geoIsopolygons' => array(self::HAS_MANY, 'GeoIsopolygon', 'id_hiper'),
			'tblIdEncuestaZcs' => array(self::HAS_MANY, 'TblIdEncuestaZc', 'id_hiper_alcampo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_hiper_alcampo' => 'Id Alcampo',
			'cod_nielssen' => 'Codigo Nielssen',
			'nombre' => 'Nombre',
			'region' => 'Region',
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

		$criteria->compare('id_hiper_alcampo',$this->id_hiper_alcampo);
		$criteria->compare('cod_nielssen',$this->cod_nielssen,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('region',$this->region);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}