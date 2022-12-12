<?php

/**
 * This is the model class for table "geo_zona_influencia".
 *
 * The followings are the available columns in table 'geo_zona_influencia':
 * @property integer $gid
 * @property string $loc
 * @property string $geom
 *
 * The followings are the available model relations:
 * @property TblZonaInfluencia[] $tblZonaInfluencias
 */
class GeoZonaInfluencia extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return GeoZonaInfluencia the static model class
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
		return 'geo_zona_influencia';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('loc', 'length', 'max'=>50),
			array('geom', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('gid, loc, geom', 'safe', 'on'=>'search'),
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
			'tblZonaInfluencias' => array(self::HAS_MANY, 'TblZonaInfluencia', 'loc'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'gid' => 'Gid',
			'loc' => 'Loc',
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
		$criteria->compare('loc',$this->loc,true);
		$criteria->compare('geom',$this->geom,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}