<?php

/**
 * This is the model class for table "tbl_zc_consolidado".
 *
 * The followings are the available columns in table 'tbl_zc_consolidado':
 * @property integer $id
 * @property integer $cod_zipcode
 * @property string $cp
 * @property string $venta_si
 * @property string $venta_no
 * @property string $venta_ns
 * @property string $folleto_si
 * @property string $folleto_no
 * @property string $folleto_ns
 *
 * The followings are the available model relations:
 * @property TblZc $codZipcode
 */
class TblZcConsolidado extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TblZcConsolidado the static model class
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
		return 'tbl_zc_consolidado';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cod_zipcode', 'numerical', 'integerOnly'=>true),
			array('cp, venta_si, venta_no, venta_ns, folleto_si, folleto_no, folleto_ns', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, cod_zipcode, cp, venta_si, venta_no, venta_ns, folleto_si, folleto_no, folleto_ns', 'safe', 'on'=>'search'),
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
			'codZipcode' => array(self::BELONGS_TO, 'TblZc', 'cod_zipcode'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'cod_zipcode' => 'Cod Zipcode',
			'cp' => 'Cp',
			'venta_si' => 'Venta Si',
			'venta_no' => 'Venta No',
			'venta_ns' => 'Venta Ns',
			'folleto_si' => 'Folleto Si',
			'folleto_no' => 'Folleto No',
			'folleto_ns' => 'Folleto Ns',
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
		$criteria->compare('cod_zipcode',$this->cod_zipcode);
		$criteria->compare('cp',$this->cp,true);
		$criteria->compare('venta_si',$this->venta_si,true);
		$criteria->compare('venta_no',$this->venta_no,true);
		$criteria->compare('venta_ns',$this->venta_ns,true);
		$criteria->compare('folleto_si',$this->folleto_si,true);
		$criteria->compare('folleto_no',$this->folleto_no,true);
		$criteria->compare('folleto_ns',$this->folleto_ns,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}