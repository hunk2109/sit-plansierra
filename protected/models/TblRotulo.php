<?php

/**
 * This is the model class for table "tbl_rotulo".
 *
 * The followings are the available columns in table 'tbl_rotulo':
 * @property integer $id_rotulo
 * @property string $rotulo
 * @property string $logo
 * @property integer $id_etiqueta
 *
 * The followings are the available model relations:
 * @property TblEtiqueta $idEtiqueta
 * @property TblCodigoMkt[] $tblCodigoMkts
 */
class TblRotulo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TblRotulo the static model class
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
		return 'tbl_rotulo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_rotulo', 'required'),
			array('id_rotulo, id_etiqueta', 'numerical', 'integerOnly'=>true),
			array('rotulo, logo', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_rotulo, rotulo, logo, id_etiqueta', 'safe', 'on'=>'search'),
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
			'idEtiqueta' => array(self::BELONGS_TO, 'TblEtiqueta', 'id_etiqueta'),
			'tblCodigoMkts' => array(self::HAS_MANY, 'TblCodigoMkt', 'etiqueta'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_rotulo' => 'Id Rotulo',
			'rotulo' => 'Rotulo',
			'logo' => 'Logo',
			'id_etiqueta' => 'Id Etiqueta',
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

		$criteria->compare('id_rotulo',$this->id_rotulo);
		$criteria->compare('rotulo',$this->rotulo,true);
		$criteria->compare('logo',$this->logo,true);
		$criteria->compare('id_etiqueta',$this->id_etiqueta);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}