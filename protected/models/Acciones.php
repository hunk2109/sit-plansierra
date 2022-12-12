<?php

/**
 * This is the model class for table "acciones".
 *
 * The followings are the available columns in table 'acciones':
 * @property integer $id
 * @property string $grupo
 * @property string $accion
 *
 * The followings are the available model relations:
 * @property Groups $grupo0
 */
class Acciones extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Acciones the static model class
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
		return 'acciones';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('grupo', 'length', 'max'=>20),
			array('accion', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, grupo, accion', 'safe', 'on'=>'search'),
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
			'grupo0' => array(self::BELONGS_TO, 'Groups', 'grupo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'grupo' => 'Grupo',
			'accion' => 'Accion',
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
		$criteria->compare('grupo',$this->grupo,true);
		$criteria->compare('accion',$this->accion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}