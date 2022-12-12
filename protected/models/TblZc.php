<?php

/**
 * This is the model class for table "tbl_zc".
 *
 * The followings are the available columns in table 'tbl_zc':
 * @property integer $cod_zipcode
 * @property string $fecha_ini
 * @property string $fecha_fin
 * @property integer $id_alcampo
 * @property integer $tipo_zc
 * @property double $cv
 *
 * The followings are the available model relations:
 * @property TblZcConsolidado[] $tblZcConsolidados
 * @property TblZcMercados[] $tblZcMercadoses
 * @property TblHiperAlcampo $idAlcampo
 */
class TblZc extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TblZc the static model class
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
		return 'tbl_zc';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cod_zipcode', 'required'),
			array('cod_zipcode, id_alcampo, tipo_zc', 'numerical', 'integerOnly'=>true),
			array('cv', 'numerical'),
			//--------------------------------------------------------------------
			
			//ORIGINAL: COMENTADO PARA QUE FUNCIONE EL ACTUALIZAR ZC DE JUAN LUIS. DABA PROBLEMA CON FECHA_INI
			//array('fecha_ini, fecha_fin', 'safe'),
			
			//MODIFICADO
			array('fecha_fin', 'safe'),
			
			//--------------------------------------------------------------------
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cod_zipcode, fecha_ini, fecha_fin, id_alcampo, tipo_zc, cv', 'safe', 'on'=>'search'),
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
			'tblZcConsolidados' => array(self::HAS_MANY, 'TblZcConsolidado', 'cod_zipcode'),
			'tblZcMercadoses' => array(self::HAS_MANY, 'TblZcMercados', 'cod_zipcode'),
			'idAlcampo' => array(self::BELONGS_TO, 'TblHiperAlcampo', 'id_alcampo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'cod_zipcode' => 'Cod Zipcode',
			'fecha_ini' => 'Fecha Ini',
			'fecha_fin' => 'Fecha Fin',
			'id_alcampo' => 'Id Alcampo',
			'tipo_zc' => 'Tipo Zc',
			'cv' => 'Cv',
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

		$criteria->compare('cod_zipcode',$this->cod_zipcode);
		$criteria->compare('fecha_ini',$this->fecha_ini,true);
		$criteria->compare('fecha_fin',$this->fecha_fin,true);
		$criteria->compare('id_alcampo',$this->id_alcampo);
		$criteria->compare('tipo_zc',$this->tipo_zc);
		$criteria->compare('cv',$this->cv);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}