<?php

/**
 * This is the model class for table "tbl_iso_cv".
 *
 * The followings are the available columns in table 'tbl_iso_cv':
 * @property integer $id_iso_cv_zc
 * @property integer $id_encuesta_zc
 * @property integer $iso
 * @property string $cv
 *
 * The followings are the available model relations:
 * @property TblIsoDesc $iso0
 * @property TblZc $idEncuestaZc
 */
class TblIsoCv extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TblIsoCv the static model class
	 */
	public $fecha_ini;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_iso_cv';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_encuesta_zc, iso', 'numerical', 'integerOnly'=>true),
			array('cv', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_iso_cv_zc, id_encuesta_zc, iso, cv', 'safe', 'on'=>'search'),
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
			'iso0' => array(self::BELONGS_TO, 'TblIsoDesc', 'iso'),
			'idEncuestaZc' => array(self::BELONGS_TO, 'TblZc', 'id_encuesta_zc'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_iso_cv_zc' => 'Id Iso Cv Zc',
			'id_encuesta_zc' => 'Id Encuesta Zc',
			'iso' => 'Iso',
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

		$criteria->compare('id_iso_cv_zc',$this->id_iso_cv_zc);
		$criteria->compare('id_encuesta_zc',$this->id_encuesta_zc);
		$criteria->compare('iso',$this->iso);
		$criteria->compare('cv',$this->cv,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}