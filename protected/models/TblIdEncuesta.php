<?php

/**
 * This is the model class for table "tbl_id_encuesta".
 *
 * The followings are the available columns in table 'tbl_id_encuesta':
 * @property string $fecha_encuesta
 * @property integer $id_alcampo
 * @property integer $id_encuesta
 *
 * The followings are the available model relations:
 * @property TblHiperAlcampo $idAlcampo
 * @property TblEncuestaInfluencia[] $tblEncuestaInfluencias
 */
class TblIdEncuesta extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TblIdEncuesta the static model class
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
		return 'tbl_id_encuesta';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_alcampo', 'numerical', 'integerOnly'=>true),
			array('fecha_encuesta', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('fecha_encuesta, id_alcampo, id_encuesta', 'safe', 'on'=>'search'),
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
			'idAlcampo' => array(self::BELONGS_TO, 'TblHiperAlcampo', 'id_alcampo'),
			'tblEncuestaInfluencias' => array(self::HAS_MANY, 'TblEncuestaInfluencia', 'id_encuesta'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'fecha_encuesta' => 'Fecha Encuesta',
			'id_alcampo' => 'Id Alcampo',
			'id_encuesta' => 'Id Encuesta',
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

		$criteria->compare('fecha_encuesta',$this->fecha_encuesta,true);
		$criteria->compare('id_alcampo',$this->id_alcampo);
		$criteria->compare('id_encuesta',$this->id_encuesta);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}