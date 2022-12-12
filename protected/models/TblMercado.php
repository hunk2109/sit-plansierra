<?php

/**
 * This is the model class for table "tbl_mercado".
 *
 * The followings are the available columns in table 'tbl_mercado':
 * @property integer $id_mercado
 * @property string $desc_mercado
 * @property integer $id_sector
 *
 * The followings are the available model relations:
 * @property TblSectores $idSector
 */
class TblMercado extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TblMercado the static model class
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
		return 'tbl_mercado';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_mercado', 'required'),
			array('id_mercado, id_sector', 'numerical', 'integerOnly'=>true),
			array('desc_mercado', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_mercado, desc_mercado, id_sector', 'safe', 'on'=>'search'),
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
			'idSector' => array(self::BELONGS_TO, 'TblSectores', 'id_sector'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_mercado' => 'Id Mercado',
			'desc_mercado' => 'Desc Mercado',
			'id_sector' => 'Id Sector',
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

		$criteria->compare('id_mercado',$this->id_mercado);
		$criteria->compare('desc_mercado',$this->desc_mercado,true);
		$criteria->compare('id_sector',$this->id_sector);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}