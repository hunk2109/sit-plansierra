<?php

/**
 * This is the model class for table "tbl_cl_registros".
 *
 * The followings are the available columns in table 'tbl_cl_registros':
 * @property integer $id
 * @property string $fecha
 * @property string $cp
 * @property integer $tipo_fuente
 * @property integer $cod_edad
 * @property integer $num_clientes
 *
 * The followings are the available model relations:
 * @property TblClFuentes $tipoFuente
 * @property TblClCodEdad $codEdad
 */
class TblClRegistros extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TblClRegistros the static model class
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
		return 'tbl_cl_registros';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tipo_fuente, cod_edad, num_clientes', 'numerical', 'integerOnly'=>true),
			array('cp', 'length', 'max'=>5),
			array('fecha', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, fecha, cp, tipo_fuente, cod_edad, num_clientes', 'safe', 'on'=>'search'),
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
			'tipoFuente' => array(self::BELONGS_TO, 'TblClFuentes', 'tipo_fuente'),
			'codEdad' => array(self::BELONGS_TO, 'TblClCodEdad', 'cod_edad'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'fecha' => 'Fecha',
			'cp' => 'Cp',
			'tipo_fuente' => 'Tipo Fuente',
			'cod_edad' => 'Cod Edad',
			'num_clientes' => 'Num Clientes',
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
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('cp',$this->cp,true);
		$criteria->compare('tipo_fuente',$this->tipo_fuente);
		$criteria->compare('cod_edad',$this->cod_edad);
		$criteria->compare('num_clientes',$this->num_clientes);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}