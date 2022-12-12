<?php

/**
 * This is the model class for table "geo_isolines".
 *
 * The followings are the available columns in table 'geo_isolines':
 * @property integer $gid
 * @property integer $iso
 * @property integer $id_hiper
 * @property string $geom
 *
 * The followings are the available model relations:
 * @property TblHiperAlcampo $idHiper
 */
class GeoIsolines extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return GeoIsolines the static model class
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
		return 'geo_isolines';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('iso, id_hiper', 'numerical', 'integerOnly'=>true),
			array('geom', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('gid, iso, id_hiper, geom', 'safe', 'on'=>'search'),
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
			'idHiper' => array(self::BELONGS_TO, 'TblHiperAlcampo', 'id_hiper'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'gid' => 'Gid',
			'iso' => 'Iso',
			'id_hiper' => 'Id Hiper',
			'geom' => 'Geom',
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

		$criteria->compare('gid',$this->gid);
		$criteria->compare('iso',$this->iso);
		$criteria->compare('id_hiper',$this->id_hiper);
		$criteria->compare('geom',$this->geom,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}