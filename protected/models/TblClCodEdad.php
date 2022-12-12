<?php

/**
 * This is the model class for table "tbl_cl_cod_edad".
 *
 * The followings are the available columns in table 'tbl_cl_cod_edad':
 * @property integer $cod_edad
 * @property string $desc_cod_edad
 *
 * The followings are the available model relations:
 * @property TblClClientes[] $tblClClientes
 * @property TblClRegistros[] $tblClRegistroses
 */
class TblClCodEdad extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TblClCodEdad the static model class
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
		return 'tbl_cl_cod_edad';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cod_edad', 'required'),
			array('cod_edad', 'numerical', 'integerOnly'=>true),
			array('desc_cod_edad', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cod_edad, desc_cod_edad', 'safe', 'on'=>'search'),
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
			'tblClClientes' => array(self::HAS_MANY, 'TblClClientes', 'cod_edad'),
			'tblClRegistroses' => array(self::HAS_MANY, 'TblClRegistros', 'cod_edad'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'cod_edad' => 'Cod Edad',
			'desc_cod_edad' => 'Desc Cod Edad',
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

		$criteria->compare('cod_edad',$this->cod_edad);
		$criteria->compare('desc_cod_edad',$this->desc_cod_edad,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}