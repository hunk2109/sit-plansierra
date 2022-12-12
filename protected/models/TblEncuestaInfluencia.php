<?php

/**
 * This is the model class for table "tbl_encuesta_influencia".
 *
 * The followings are the available columns in table 'tbl_encuesta_influencia':
 * @property integer $id
 * @property integer $id_encuesta
 * @property integer $registro_encuesta
 * @property string $cp
 * @property string $loc_mkt
 * @property string $ponderacion
 * @property integer $p
 * @property string $tipo
 *
 * The followings are the available model relations:
 * @property TblIdEncuesta $idEncuesta
 * @property GeoCp $cp0
 * @property TblCodigoMkt $p0
 */
class TblEncuestaInfluencia extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TblEncuestaInfluencia the static model class
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
		return 'tbl_encuesta_influencia';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_encuesta', 'required'),
			array('id_encuesta, registro_encuesta, p', 'numerical', 'integerOnly'=>true),
			array('tipo', 'length', 'max'=>2),
			array('cp, loc_mkt, ponderacion', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_encuesta, registro_encuesta, cp, loc_mkt, ponderacion, p, tipo', 'safe', 'on'=>'search'),
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
			'idEncuesta' => array(self::BELONGS_TO, 'TblIdEncuesta', 'id_encuesta'),
			'cp0' => array(self::BELONGS_TO, 'GeoCp', 'cp'),
			'p0' => array(self::BELONGS_TO, 'TblCodigoMkt', 'p'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_encuesta' => 'Id Encuesta',
			'registro_encuesta' => 'Registro Encuesta',
			'cp' => 'Cp',
			'loc_mkt' => 'Loc Mkt',
			'ponderacion' => 'Ponderacion',
			'p' => 'P',
			'tipo' => 'Tipo',
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
		$criteria->compare('id_encuesta',$this->id_encuesta);
		$criteria->compare('registro_encuesta',$this->registro_encuesta);
		$criteria->compare('cp',$this->cp,true);
		$criteria->compare('loc_mkt',$this->loc_mkt,true);
		$criteria->compare('ponderacion',$this->ponderacion,true);
		$criteria->compare('p',$this->p);
		$criteria->compare('tipo',$this->tipo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}