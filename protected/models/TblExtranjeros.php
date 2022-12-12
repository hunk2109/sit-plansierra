<?php

/**
 * This is the model class for table "tbl_extranjeros".
 *
 * The followings are the available columns in table 'tbl_extranjeros':
 * @property integer $id
 * @property string $seccion
 * @property integer $nacionalidad
 * @property integer $poblacion
 *
 * The followings are the available model relations:
 * @property GeoSecciones $seccion0
 * @property TblAuxExtranjeros $nacionalidad0
 */
class TblExtranjeros extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TblExtranjeros the static model class
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
		return 'tbl_extranjeros';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nacionalidad, poblacion', 'numerical', 'integerOnly'=>true),
			array('seccion', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, seccion, nacionalidad, poblacion', 'safe', 'on'=>'search'),
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
			'seccion0' => array(self::BELONGS_TO, 'GeoSecciones', 'seccion'),
			'nacionalidad0' => array(self::BELONGS_TO, 'TblAuxExtranjeros', 'nacionalidad'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'seccion' => 'Seccion',
			'nacionalidad' => 'Nacionalidad',
			'poblacion' => 'Poblacion',
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
		$criteria->compare('seccion',$this->seccion,true);
		$criteria->compare('nacionalidad',$this->nacionalidad);
		$criteria->compare('poblacion',$this->poblacion);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}