<?php

/**
 * This is the model class for table "geo_cp".
 *
 * The followings are the available columns in table 'geo_cp':
 * @property integer $gid
 * @property string $cp
 * @property string $sum_pob
 * @property string $geom
 *
 * The followings are the available model relations:
 * @property TblEncuestaInfluencia[] $tblEncuestaInfluencias
 * @property TblZipcode[] $tblZipcodes
 */
class GeoCp extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return GeoCp the static model class
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
		return 'geo_cp';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cp, sum_pob, geom', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('gid, cp, sum_pob, geom', 'safe', 'on'=>'search'),
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
			'tblEncuestaInfluencias' => array(self::HAS_MANY, 'TblEncuestaInfluencia', 'cp'),
			'tblZipcodes' => array(self::HAS_MANY, 'TblZipcode', 'cp'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'gid' => 'Gid',
			'cp' => 'Cp',
			'sum_pob' => 'Sum Pob',
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
		$criteria->compare('cp',$this->cp,true);
		$criteria->compare('sum_pob',$this->sum_pob,true);
		$criteria->compare('geom',$this->geom,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}