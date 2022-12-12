<?php

/**
 * This is the model class for table "tbl_cl_fuentes".
 *
 * The followings are the available columns in table 'tbl_cl_fuentes':
 * @property integer $cod_fuente
 * @property string $desc_fuente
 *
 * The followings are the available model relations:
 * @property TblClRegistros[] $tblClRegistroses
 */
class TblClFuentes extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TblClFuentes the static model class
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
		return 'tbl_cl_fuentes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cod_fuente', 'required'),
			array('cod_fuente', 'numerical', 'integerOnly'=>true),
			array('desc_fuente', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cod_fuente, desc_fuente', 'safe', 'on'=>'search'),
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
			'tblClRegistroses' => array(self::HAS_MANY, 'TblClRegistros', 'tipo_fuente'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'cod_fuente' => 'Cod Fuente',
			'desc_fuente' => 'Desc Fuente',
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

		$criteria->compare('cod_fuente',$this->cod_fuente);
		$criteria->compare('desc_fuente',$this->desc_fuente,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}