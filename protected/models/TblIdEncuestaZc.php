<?php

/**
 * This is the model class for table "tbl_id_encuesta_zc".
 *
 * The followings are the available columns in table 'tbl_id_encuesta_zc':
 * @property integer $id_encuesta_zc
 * @property string $fecha_ini
 * @property string $fecha_fin
 * @property integer $id_hiper_alcampo
 * @property integer $tipo_zc
 * @property string $cv
 *
 * The followings are the available model relations:
 * @property TblZipcode[] $tblZipcodes
 * @property TblIsoCv[] $tblIsoCvs
 * @property TblHiperAlcampo $idHiperAlcampo
 * @property TblIsoPob[] $tblIsoPobs
 */
class TblIdEncuestaZc extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TblIdEncuestaZc the static model class
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
		return 'tbl_id_encuesta_zc';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_hiper_alcampo, tipo_zc', 'numerical', 'integerOnly'=>true),
			array('fecha_ini, fecha_fin, cv', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_encuesta_zc, fecha_ini, fecha_fin, id_hiper_alcampo, tipo_zc, cv', 'safe', 'on'=>'search'),
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
			'tblZipcodes' => array(self::HAS_MANY, 'TblZipcode', 'id_encuesta_zc'),
			'tblIsoCvs' => array(self::HAS_MANY, 'TblIsoCv', 'id_encuesta_zc'),
			'idHiperAlcampo' => array(self::BELONGS_TO, 'TblHiperAlcampo', 'id_hiper_alcampo'),
			'tblIsoPobs' => array(self::HAS_MANY, 'TblIsoPob', 'id_encuesta_zc'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_encuesta_zc' => 'Id Encuesta Zc',
			'fecha_ini' => 'Fecha Ini',
			'fecha_fin' => 'Fecha Fin',
			'id_hiper_alcampo' => 'Id Hiper Alcampo',
			'tipo_zc' => 'Tipo Zc',
			'cv' => 'Cv',
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

		$criteria->compare('id_encuesta_zc',$this->id_encuesta_zc);
		$criteria->compare('fecha_ini',$this->fecha_ini,true);
		$criteria->compare('fecha_fin',$this->fecha_fin,true);
		$criteria->compare('id_hiper_alcampo',$this->id_hiper_alcampo);
		$criteria->compare('tipo_zc',$this->tipo_zc);
		$criteria->compare('cv',$this->cv,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}