<?php

/**
 * This is the model class for table "tbl_etiqueta".
 *
 * The followings are the available columns in table 'tbl_etiqueta':
 * @property integer $id_etiqueta
 * @property string $etiqueta
 * @property string $logo
 *
 * The followings are the available model relations:
 * @property TblRotulo[] $tblRotulos
 */
class TblEtiqueta extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TblEtiqueta the static model class
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
		return 'tbl_etiqueta';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_etiqueta', 'required'),
			array('id_etiqueta', 'numerical', 'integerOnly'=>true),
			array('etiqueta, logo', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_etiqueta, etiqueta, logo', 'safe', 'on'=>'search'),
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
			'tblRotulos' => array(self::HAS_MANY, 'TblRotulo', 'id_etiqueta'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_etiqueta' => 'Id Etiqueta',
			'etiqueta' => 'Etiqueta',
			'logo' => 'Logo',
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

		$criteria->compare('id_etiqueta',$this->id_etiqueta);
		$criteria->compare('etiqueta',$this->etiqueta,true);
		$criteria->compare('logo',$this->logo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}