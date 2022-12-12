<?php

/**
 * This is the model class for table "tbl_zipcode_mercados".
 *
 * The followings are the available columns in table 'tbl_zipcode_mercados':
 * @property integer $id
 * @property integer $id_consulta_en_cp
 * @property integer $id_mercado
 * @property string $cv
 * @property string $caddy
 */
class TblZipcodeMercados extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TblZipcodeMercados the static model class
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
		return 'tbl_zipcode_mercados';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_consulta_en_cp, id_mercado', 'numerical', 'integerOnly'=>true),
			array('cv, caddy', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_consulta_en_cp, id_mercado, cv, caddy', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_consulta_en_cp' => 'Id Consulta En Cp',
			'id_mercado' => 'Id Mercado',
			'cv' => 'Cv',
			'caddy' => 'Caddy',
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
		$criteria->compare('id_consulta_en_cp',$this->id_consulta_en_cp);
		$criteria->compare('id_mercado',$this->id_mercado);
		$criteria->compare('cv',$this->cv,true);
		$criteria->compare('caddy',$this->caddy,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}