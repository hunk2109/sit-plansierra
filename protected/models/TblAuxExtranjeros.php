<?php

/**
 * This is the model class for table "tbl_aux_extranjeros".
 *
 * The followings are the available columns in table 'tbl_aux_extranjeros':
 * @property integer $id_nacionalidad
 * @property string $desc_nacionalidad
 * @property integer $tipo
 * @property integer $grupo
 *
 * The followings are the available model relations:
 * @property TblExtranjeros[] $tblExtranjeroses
 */
class TblAuxExtranjeros extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TblAuxExtranjeros the static model class
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
		return 'tbl_aux_extranjeros';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_nacionalidad', 'required'),
			array('id_nacionalidad, tipo, grupo', 'numerical', 'integerOnly'=>true),
			array('desc_nacionalidad', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_nacionalidad, desc_nacionalidad, tipo, grupo', 'safe', 'on'=>'search'),
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
			'tblExtranjeroses' => array(self::HAS_MANY, 'TblExtranjeros', 'nacionalidad'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_nacionalidad' => 'Id Nacionalidad',
			'desc_nacionalidad' => 'Desc Nacionalidad',
			'tipo' => 'Tipo',
			'grupo' => 'Grupo',
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

		$criteria->compare('id_nacionalidad',$this->id_nacionalidad);
		$criteria->compare('desc_nacionalidad',$this->desc_nacionalidad,true);
		$criteria->compare('tipo',$this->tipo);
		$criteria->compare('grupo',$this->grupo);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}