<?php

/**
 * This is the model class for table "tbl_iso_pob".
 *
 * The followings are the available columns in table 'tbl_iso_pob':
 * @property integer $id
 * @property integer $id_encuesta_zc
 * @property string $secc
 * @property string $p1
 * @property string $p2
 * @property string $p3
 * @property string $p4
 * @property string $p5
 * @property string $p_secc
 *
 * The followings are the available model relations:
 * @property TblZc $idEncuestaZc
 */
class TblIsoPob extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TblIsoPob the static model class
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
		return 'tbl_iso_pob';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_encuesta_zc', 'numerical', 'integerOnly'=>true),
			array('secc, p1, p2, p3, p4, p5, p_secc', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_encuesta_zc, secc, p1, p2, p3, p4, p5, p_secc', 'safe', 'on'=>'search'),
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
			'idEncuestaZc' => array(self::BELONGS_TO, 'TblZc', 'id_encuesta_zc'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_encuesta_zc' => 'Id Encuesta Zc',
			'secc' => 'Secc',
			'p1' => 'P1',
			'p2' => 'P2',
			'p3' => 'P3',
			'p4' => 'P4',
			'p5' => 'P5',
			'p_secc' => 'P Secc',
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
		$criteria->compare('id_encuesta_zc',$this->id_encuesta_zc);
		$criteria->compare('secc',$this->secc,true);
		$criteria->compare('p1',$this->p1,true);
		$criteria->compare('p2',$this->p2,true);
		$criteria->compare('p3',$this->p3,true);
		$criteria->compare('p4',$this->p4,true);
		$criteria->compare('p5',$this->p5,true);
		$criteria->compare('p_secc',$this->p_secc,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}