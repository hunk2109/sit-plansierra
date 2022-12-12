<?php

/**
 * This is the model class for table "tbl_ecom".
 *
 * The followings are the available columns in table 'tbl_ecom':
 * @property integer $id
 * @property string $fecha
 * @property integer $id_hiper
 * @property string $cp
 * @property string $cv
 * @property integer $tipo_entrega
 * @property integer $num_pedidos
 * @property integer $clientes_unicos
 *
 * The followings are the available model relations:
 * @property TblHiperAlcampo $idHiper
 */
class TblEcom extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TblEcom the static model class
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
		return 'tbl_ecom';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_hiper, tipo_entrega, num_pedidos, clientes_unicos', 'numerical', 'integerOnly'=>true),
			array('cp', 'length', 'max'=>5),
			array('fecha, cv', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, fecha, id_hiper, cp, cv, tipo_entrega, num_pedidos, clientes_unicos', 'safe', 'on'=>'search'),
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
			'idHiper' => array(self::BELONGS_TO, 'TblHiperAlcampo', 'id_hiper'),
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
			'id_hiper' => 'Id Hiper',
			'cp' => 'Cp',
			'cv' => 'Cv',
			'tipo_entrega' => 'Tipo Entrega',
			'num_pedidos' => 'Num Pedidos',
			'clientes_unicos' => 'Clientes Unicos',
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
		$criteria->compare('id_hiper',$this->id_hiper);
		$criteria->compare('cp',$this->cp,true);
		$criteria->compare('cv',$this->cv,true);
		$criteria->compare('tipo_entrega',$this->tipo_entrega);
		$criteria->compare('num_pedidos',$this->num_pedidos);
		$criteria->compare('clientes_unicos',$this->clientes_unicos);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}