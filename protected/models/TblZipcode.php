<?php

/**
 * This is the model class for table "tbl_zipcode".
 *
 * The followings are the available columns in table 'tbl_zipcode':
 * @property integer $id_consulta_por_cp
 * @property integer $id_encuesta_zc
 * @property string $cp
 * @property string $cv_porc
 * @property string $caddy
 * @property string $pasos
 * @property string $folleto
 *
 * The followings are the available model relations:
 * @property TblIdEncuestaZc $idEncuestaZc
 * @property GeoCp $cp0
 */
class TblZipcode extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TblZipcode the static model class
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
		return 'tbl_zipcode';
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
			array('cp, cv_porc, caddy, pasos, folleto', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_consulta_por_cp, id_encuesta_zc, cp, cv_porc, caddy, pasos, folleto', 'safe', 'on'=>'search'),
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
			'idEncuestaZc' => array(self::BELONGS_TO, 'TblIdEncuestaZc', 'id_encuesta_zc'),
			'cp0' => array(self::BELONGS_TO, 'GeoCp', 'cp'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_consulta_por_cp' => 'Id Consulta Por Cp',
			'id_encuesta_zc' => 'Id Encuesta Zc',
			'cp' => 'Cp',
			'cv_porc' => 'Cv_porc',
			'caddy' => 'Caddy',
			'pasos' => 'Pasos',
			'folleto' => 'Folleto',
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

		$criteria->compare('id_consulta_por_cp',$this->id_consulta_por_cp);
		$criteria->compare('id_encuesta_zc',$this->id_encuesta_zc);
		$criteria->compare('cp',$this->cp,true);
		$criteria->compare('cv_porc',$this->cv_porc,true);
		$criteria->compare('caddy',$this->caddy,true);
		$criteria->compare('pasos',$this->pasos,true);
		$criteria->compare('folleto',$this->folleto,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}