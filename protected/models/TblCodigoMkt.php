<?php

/**
 * This is the model class for table "tbl_codigo_mkt".
 *
 * The followings are the available columns in table 'tbl_codigo_mkt':
 * @property integer $codigo
 * @property integer $tipo
 * @property string $nielssen
 * @property integer $etiqueta
 * @property string $observ
 *
 * The followings are the available model relations:
 * @property TblRotulo $etiqueta0
 * @property GeoNielssen $nielssen0
 * @property TblEncuestaInfluencia[] $tblEncuestaInfluencias
 * @property TblEncuestaInfluencia[] $tblEncuestaInfluencias1
 * @property TblEncuestaInfluencia[] $tblEncuestaInfluencias2
 */
class TblCodigoMkt extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TblCodigoMkt the static model class
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
		return 'tbl_codigo_mkt';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('codigo', 'required'),
			array('codigo, tipo, etiqueta', 'numerical', 'integerOnly'=>true),
			array('nielssen, observ', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('codigo, tipo, nielssen, etiqueta, observ', 'safe', 'on'=>'search'),
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
			'etiqueta0' => array(self::BELONGS_TO, 'TblRotulo', 'etiqueta'),
			'nielssen0' => array(self::BELONGS_TO, 'GeoNielssen', 'nielssen'),
			'tblEncuestaInfluencias' => array(self::HAS_MANY, 'TblEncuestaInfluencia', 'p1'),
			'tblEncuestaInfluencias1' => array(self::HAS_MANY, 'TblEncuestaInfluencia', 'p2'),
			'tblEncuestaInfluencias2' => array(self::HAS_MANY, 'TblEncuestaInfluencia', 'p3'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'codigo' => 'Codigo',
			'tipo' => 'Tipo',
			'nielssen' => 'Nielssen',
			'etiqueta' => 'Etiqueta',
			'observ' => 'Observ',
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

		$criteria->compare('codigo',$this->codigo);
		$criteria->compare('tipo',$this->tipo);
		$criteria->compare('nielssen',$this->nielssen,true);
		$criteria->compare('etiqueta',$this->etiqueta);
		$criteria->compare('observ',$this->observ,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}