<?php

/**
 * This is the model class for table "tbl_zona_zipcode".
 *
 * The followings are the available columns in table 'tbl_zona_zipcode':
 * @property integer $id
 * @property integer $id_hiper_alcampo
 * @property string $cp
 *
 * The followings are the available model relations:
 * @property TblHiperAlcampo $idHiperAlcampo
 */
class TblZonaZipcode extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TblZonaZipcode the static model class
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
		return 'tbl_zona_zipcode';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_hiper_alcampo, cp', 'required'),
			array('id_hiper_alcampo', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_hiper_alcampo, cp', 'safe', 'on'=>'search'),
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
			'idHiperAlcampo' => array(self::BELONGS_TO, 'TblHiperAlcampo', 'id_hiper_alcampo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_hiper_alcampo' => 'Id Hiper Alcampo',
			'cp' => 'Cp',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('id_hiper_alcampo',$this->id_hiper_alcampo);
		$criteria->compare('cp',$this->cp,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}