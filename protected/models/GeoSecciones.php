<?php

/**
 * This is the model class for table "geo_secciones".
 *
 * The followings are the available columns in table 'geo_secciones':
 * @property string $geom
 * @property string $cod_secc
 * @property string $cod_mun
 * @property string $pob_0005
 * @property string $pob_0514
 * @property string $pob_1519
 * @property string $pob_2029
 * @property string $pob_2965
 * @property string $pob_6599
 * @property string $pobex_afric
 * @property string $pobex_ameri
 * @property string $pobex_asiat
 * @property string $pobex_europ
 * @property string $pobex_resto
 * @property integer $id
 *
 * The followings are the available model relations:
 * @property TblExtranjeros[] $tblExtranjeroses
 */
class GeoSecciones extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return GeoSecciones the static model class
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
		return 'geo_secciones';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cod_secc', 'length', 'max'=>10),
			array('cod_mun', 'length', 'max'=>5),
			array('geom, pob_0005, pob_0514, pob_1519, pob_2029, pob_2965, pob_6599, pobex_afric, pobex_ameri, pobex_asiat, pobex_europ, pobex_resto', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('geom, cod_secc, cod_mun, pob_0005, pob_0514, pob_1519, pob_2029, pob_2965, pob_6599, pobex_afric, pobex_ameri, pobex_asiat, pobex_europ, pobex_resto, id', 'safe', 'on'=>'search'),
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
			'tblExtranjeroses' => array(self::HAS_MANY, 'TblExtranjeros', 'seccion'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'geom' => 'Geom',
			'cod_secc' => 'Cod Secc',
			'cod_mun' => 'Cod Mun',
			'pob_0005' => 'Pob 0005',
			'pob_0514' => 'Pob 0514',
			'pob_1519' => 'Pob 1519',
			'pob_2029' => 'Pob 2029',
			'pob_2965' => 'Pob 2965',
			'pob_6599' => 'Pob 6599',
			'pobex_afric' => 'Pobex Afric',
			'pobex_ameri' => 'Pobex Ameri',
			'pobex_asiat' => 'Pobex Asiat',
			'pobex_europ' => 'Pobex Europ',
			'pobex_resto' => 'Pobex Resto',
			'id' => 'ID',
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

		$criteria->compare('geom',$this->geom,true);
		$criteria->compare('cod_secc',$this->cod_secc,true);
		$criteria->compare('cod_mun',$this->cod_mun,true);
		$criteria->compare('pob_0005',$this->pob_0005,true);
		$criteria->compare('pob_0514',$this->pob_0514,true);
		$criteria->compare('pob_1519',$this->pob_1519,true);
		$criteria->compare('pob_2029',$this->pob_2029,true);
		$criteria->compare('pob_2965',$this->pob_2965,true);
		$criteria->compare('pob_6599',$this->pob_6599,true);
		$criteria->compare('pobex_afric',$this->pobex_afric,true);
		$criteria->compare('pobex_ameri',$this->pobex_ameri,true);
		$criteria->compare('pobex_asiat',$this->pobex_asiat,true);
		$criteria->compare('pobex_europ',$this->pobex_europ,true);
		$criteria->compare('pobex_resto',$this->pobex_resto,true);
		$criteria->compare('id',$this->id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}