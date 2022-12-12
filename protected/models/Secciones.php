<?php

/**
 * This is the model class for table "secciones".
 *
 * The followings are the available columns in table 'secciones':
 * @property integer $gid
 * @property string $cusec
 * @property string $cumun
 * @property string $csec
 * @property string $cdis
 * @property string $cmun
 * @property string $cpro
 * @property string $cca
 * @property string $cudis
 * @property string $clau2
 * @property string $npro
 * @property string $nca
 * @property string $nmun
 * @property string $cnut0
 * @property string $cnut1
 * @property string $cnut2
 * @property string $cnut3
 * @property string $shape_leng
 * @property string $shape_area
 * @property string $provmun
 * @property string $distrito
 * @property string $seccion
 * @property string $seccion_1
 * @property string $cod_secc_2
 * @property string $cod_secc
 * @property integer $oid_
 * @property integer $objectid
 * @property string $cod_secc_1
 * @property string $x4_h
 * @property string $x9_h
 * @property string $x14_h
 * @property string $x19_h
 * @property string $x24_h
 * @property string $x29_h
 * @property string $x34_h
 * @property string $x39_h
 * @property string $x44_h
 * @property string $x49_h
 * @property string $x54_h
 * @property string $x59_h
 * @property string $x64_h
 * @property string $x69_h
 * @property string $x74_h
 * @property string $x79_h
 * @property string $x84_h
 * @property string $x89_h
 * @property string $x94_h
 * @property string $x99_h
 * @property string $x100_h
 * @property string $total_h
 * @property integer $oid1
 * @property integer $objectid_1
 * @property string $cod_secc_3
 * @property string $x4_m
 * @property string $x9_m
 * @property string $x14_m
 * @property string $x19_m
 * @property string $x24_m
 * @property string $x29_m
 * @property string $x34_m
 * @property string $x39_m
 * @property string $x44_m
 * @property string $x49_m
 * @property string $x54_m
 * @property string $x59_m
 * @property string $x64_m
 * @property string $x69_m
 * @property string $x74_m
 * @property string $x79_m
 * @property string $x84_m
 * @property string $x89_m
 * @property string $x94_m
 * @property string $x99_m
 * @property string $x100_m
 * @property string $total_m
 * @property integer $total
 * @property integer $oid1_1
 * @property integer $objectid_2
 * @property string $cod_secc_4
 * @property string $total_ex_1
 * @property string $africana_1
 * @property string $american_1
 * @property string $asiatica_1
 * @property string $europea_1
 * @property string $resto_1
 * @property string $p_extran
 * @property string $p_africa
 * @property string $p_americ
 * @property string $p_asiati
 * @property string $p_europe
 * @property string $p_resto
 * @property string $geom
 * @property string $infancia
 * @property string $juventud
 * @property string $vejez
 * @property string $adultos_25_34
 * @property string $adultos_35_44
 * @property string $adultos_45_54
 * @property string $adultos_55_64
 * @property string $adultos_65_74
 * @property string $tam_familia
 * @property string $nivel_estudios
 * @property string $porc_casados
 * @property string $size_viv
 * @property string $rooms_viv
 * @property string $price_viv
 */
class Secciones extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Secciones the static model class
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
		return 'secciones';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('oid_, objectid, oid1, objectid_1, total, oid1_1, objectid_2', 'numerical', 'integerOnly'=>true),
			array('cusec, seccion_1', 'length', 'max'=>10),
			array('cumun, clau2, provmun', 'length', 'max'=>5),
			array('csec, cmun, seccion', 'length', 'max'=>3),
			array('cdis, cpro, cca, cnut0, distrito', 'length', 'max'=>2),
			array('cudis', 'length', 'max'=>7),
			array('npro, nca, nmun, cod_secc_2, cod_secc', 'length', 'max'=>50),
			array('cnut1, cnut2, cnut3', 'length', 'max'=>1),
			array('cod_secc_1, cod_secc_3, cod_secc_4', 'length', 'max'=>254),
			array('shape_leng, shape_area, x4_h, x9_h, x14_h, x19_h, x24_h, x29_h, x34_h, x39_h, x44_h, x49_h, x54_h, x59_h, x64_h, x69_h, x74_h, x79_h, x84_h, x89_h, x94_h, x99_h, x100_h, total_h, x4_m, x9_m, x14_m, x19_m, x24_m, x29_m, x34_m, x39_m, x44_m, x49_m, x54_m, x59_m, x64_m, x69_m, x74_m, x79_m, x84_m, x89_m, x94_m, x99_m, x100_m, total_m, total_ex_1, africana_1, american_1, asiatica_1, europea_1, resto_1, p_extran, p_africa, p_americ, p_asiati, p_europe, p_resto, geom, infancia, juventud, vejez, adultos_25_34, adultos_35_44, adultos_45_54, adultos_55_64, adultos_65_74, tam_familia, nivel_estudios, porc_casados, size_viv, rooms_viv, price_viv', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('gid, cusec, cumun, csec, cdis, cmun, cpro, cca, cudis, clau2, npro, nca, nmun, cnut0, cnut1, cnut2, cnut3, shape_leng, shape_area, provmun, distrito, seccion, seccion_1, cod_secc_2, cod_secc, oid_, objectid, cod_secc_1, x4_h, x9_h, x14_h, x19_h, x24_h, x29_h, x34_h, x39_h, x44_h, x49_h, x54_h, x59_h, x64_h, x69_h, x74_h, x79_h, x84_h, x89_h, x94_h, x99_h, x100_h, total_h, oid1, objectid_1, cod_secc_3, x4_m, x9_m, x14_m, x19_m, x24_m, x29_m, x34_m, x39_m, x44_m, x49_m, x54_m, x59_m, x64_m, x69_m, x74_m, x79_m, x84_m, x89_m, x94_m, x99_m, x100_m, total_m, total, oid1_1, objectid_2, cod_secc_4, total_ex_1, africana_1, american_1, asiatica_1, europea_1, resto_1, p_extran, p_africa, p_americ, p_asiati, p_europe, p_resto, geom, infancia, juventud, vejez, adultos_25_34, adultos_35_44, adultos_45_54, adultos_55_64, adultos_65_74, tam_familia, nivel_estudios, porc_casados, size_viv, rooms_viv, price_viv', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'gid' => 'Gid',
			'cusec' => 'Cusec',
			'cumun' => 'Cumun',
			'csec' => 'Csec',
			'cdis' => 'Cdis',
			'cmun' => 'Cmun',
			'cpro' => 'Cpro',
			'cca' => 'Cca',
			'cudis' => 'Cudis',
			'clau2' => 'Clau2',
			'npro' => 'Npro',
			'nca' => 'Nca',
			'nmun' => 'Nmun',
			'cnut0' => 'Cnut0',
			'cnut1' => 'Cnut1',
			'cnut2' => 'Cnut2',
			'cnut3' => 'Cnut3',
			'shape_leng' => 'Shape Leng',
			'shape_area' => 'Shape Area',
			'provmun' => 'Provmun',
			'distrito' => 'Distrito',
			'seccion' => 'Seccion',
			'seccion_1' => 'Seccion 1',
			'cod_secc_2' => 'Cod Secc 2',
			'cod_secc' => 'Cod Secc',
			'oid_' => 'Oid',
			'objectid' => 'Objectid',
			'cod_secc_1' => 'Cod Secc 1',
			'x4_h' => 'X4 H',
			'x9_h' => 'X9 H',
			'x14_h' => 'X14 H',
			'x19_h' => 'X19 H',
			'x24_h' => 'X24 H',
			'x29_h' => 'X29 H',
			'x34_h' => 'X34 H',
			'x39_h' => 'X39 H',
			'x44_h' => 'X44 H',
			'x49_h' => 'X49 H',
			'x54_h' => 'X54 H',
			'x59_h' => 'X59 H',
			'x64_h' => 'X64 H',
			'x69_h' => 'X69 H',
			'x74_h' => 'X74 H',
			'x79_h' => 'X79 H',
			'x84_h' => 'X84 H',
			'x89_h' => 'X89 H',
			'x94_h' => 'X94 H',
			'x99_h' => 'X99 H',
			'x100_h' => 'X100 H',
			'total_h' => 'Total H',
			'oid1' => 'Oid1',
			'objectid_1' => 'Objectid 1',
			'cod_secc_3' => 'Cod Secc 3',
			'x4_m' => 'X4 M',
			'x9_m' => 'X9 M',
			'x14_m' => 'X14 M',
			'x19_m' => 'X19 M',
			'x24_m' => 'X24 M',
			'x29_m' => 'X29 M',
			'x34_m' => 'X34 M',
			'x39_m' => 'X39 M',
			'x44_m' => 'X44 M',
			'x49_m' => 'X49 M',
			'x54_m' => 'X54 M',
			'x59_m' => 'X59 M',
			'x64_m' => 'X64 M',
			'x69_m' => 'X69 M',
			'x74_m' => 'X74 M',
			'x79_m' => 'X79 M',
			'x84_m' => 'X84 M',
			'x89_m' => 'X89 M',
			'x94_m' => 'X94 M',
			'x99_m' => 'X99 M',
			'x100_m' => 'X100 M',
			'total_m' => 'Total M',
			'total' => 'Total',
			'oid1_1' => 'Oid1 1',
			'objectid_2' => 'Objectid 2',
			'cod_secc_4' => 'Cod Secc 4',
			'total_ex_1' => 'Total Ex 1',
			'africana_1' => 'Africana 1',
			'american_1' => 'American 1',
			'asiatica_1' => 'Asiatica 1',
			'europea_1' => 'Europea 1',
			'resto_1' => 'Resto 1',
			'p_extran' => 'P Extran',
			'p_africa' => 'P Africa',
			'p_americ' => 'P Americ',
			'p_asiati' => 'P Asiati',
			'p_europe' => 'P Europe',
			'p_resto' => 'P Resto',
			'geom' => 'Geom',
			'infancia' => 'Infancia',
			'juventud' => 'Juventud',
			'vejez' => 'Vejez',
			'adultos_25_34' => 'Adultos 25 34',
			'adultos_35_44' => 'Adultos 35 44',
			'adultos_45_54' => 'Adultos 45 54',
			'adultos_55_64' => 'Adultos 55 64',
			'adultos_65_74' => 'Adultos 65 74',
			'tam_familia' => 'Tam Familia',
			'nivel_estudios' => 'Nivel Estudios',
			'porc_casados' => 'Porc Casados',
			'size_viv' => 'Size Viv',
			'rooms_viv' => 'Rooms Viv',
			'price_viv' => 'Price Viv',
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

		$criteria->compare('gid',$this->gid);
		$criteria->compare('cusec',$this->cusec,true);
		$criteria->compare('cumun',$this->cumun,true);
		$criteria->compare('csec',$this->csec,true);
		$criteria->compare('cdis',$this->cdis,true);
		$criteria->compare('cmun',$this->cmun,true);
		$criteria->compare('cpro',$this->cpro,true);
		$criteria->compare('cca',$this->cca,true);
		$criteria->compare('cudis',$this->cudis,true);
		$criteria->compare('clau2',$this->clau2,true);
		$criteria->compare('npro',$this->npro,true);
		$criteria->compare('nca',$this->nca,true);
		$criteria->compare('nmun',$this->nmun,true);
		$criteria->compare('cnut0',$this->cnut0,true);
		$criteria->compare('cnut1',$this->cnut1,true);
		$criteria->compare('cnut2',$this->cnut2,true);
		$criteria->compare('cnut3',$this->cnut3,true);
		$criteria->compare('shape_leng',$this->shape_leng,true);
		$criteria->compare('shape_area',$this->shape_area,true);
		$criteria->compare('provmun',$this->provmun,true);
		$criteria->compare('distrito',$this->distrito,true);
		$criteria->compare('seccion',$this->seccion,true);
		$criteria->compare('seccion_1',$this->seccion_1,true);
		$criteria->compare('cod_secc_2',$this->cod_secc_2,true);
		$criteria->compare('cod_secc',$this->cod_secc,true);
		$criteria->compare('oid_',$this->oid_);
		$criteria->compare('objectid',$this->objectid);
		$criteria->compare('cod_secc_1',$this->cod_secc_1,true);
		$criteria->compare('x4_h',$this->x4_h,true);
		$criteria->compare('x9_h',$this->x9_h,true);
		$criteria->compare('x14_h',$this->x14_h,true);
		$criteria->compare('x19_h',$this->x19_h,true);
		$criteria->compare('x24_h',$this->x24_h,true);
		$criteria->compare('x29_h',$this->x29_h,true);
		$criteria->compare('x34_h',$this->x34_h,true);
		$criteria->compare('x39_h',$this->x39_h,true);
		$criteria->compare('x44_h',$this->x44_h,true);
		$criteria->compare('x49_h',$this->x49_h,true);
		$criteria->compare('x54_h',$this->x54_h,true);
		$criteria->compare('x59_h',$this->x59_h,true);
		$criteria->compare('x64_h',$this->x64_h,true);
		$criteria->compare('x69_h',$this->x69_h,true);
		$criteria->compare('x74_h',$this->x74_h,true);
		$criteria->compare('x79_h',$this->x79_h,true);
		$criteria->compare('x84_h',$this->x84_h,true);
		$criteria->compare('x89_h',$this->x89_h,true);
		$criteria->compare('x94_h',$this->x94_h,true);
		$criteria->compare('x99_h',$this->x99_h,true);
		$criteria->compare('x100_h',$this->x100_h,true);
		$criteria->compare('total_h',$this->total_h,true);
		$criteria->compare('oid1',$this->oid1);
		$criteria->compare('objectid_1',$this->objectid_1);
		$criteria->compare('cod_secc_3',$this->cod_secc_3,true);
		$criteria->compare('x4_m',$this->x4_m,true);
		$criteria->compare('x9_m',$this->x9_m,true);
		$criteria->compare('x14_m',$this->x14_m,true);
		$criteria->compare('x19_m',$this->x19_m,true);
		$criteria->compare('x24_m',$this->x24_m,true);
		$criteria->compare('x29_m',$this->x29_m,true);
		$criteria->compare('x34_m',$this->x34_m,true);
		$criteria->compare('x39_m',$this->x39_m,true);
		$criteria->compare('x44_m',$this->x44_m,true);
		$criteria->compare('x49_m',$this->x49_m,true);
		$criteria->compare('x54_m',$this->x54_m,true);
		$criteria->compare('x59_m',$this->x59_m,true);
		$criteria->compare('x64_m',$this->x64_m,true);
		$criteria->compare('x69_m',$this->x69_m,true);
		$criteria->compare('x74_m',$this->x74_m,true);
		$criteria->compare('x79_m',$this->x79_m,true);
		$criteria->compare('x84_m',$this->x84_m,true);
		$criteria->compare('x89_m',$this->x89_m,true);
		$criteria->compare('x94_m',$this->x94_m,true);
		$criteria->compare('x99_m',$this->x99_m,true);
		$criteria->compare('x100_m',$this->x100_m,true);
		$criteria->compare('total_m',$this->total_m,true);
		$criteria->compare('total',$this->total);
		$criteria->compare('oid1_1',$this->oid1_1);
		$criteria->compare('objectid_2',$this->objectid_2);
		$criteria->compare('cod_secc_4',$this->cod_secc_4,true);
		$criteria->compare('total_ex_1',$this->total_ex_1,true);
		$criteria->compare('africana_1',$this->africana_1,true);
		$criteria->compare('american_1',$this->american_1,true);
		$criteria->compare('asiatica_1',$this->asiatica_1,true);
		$criteria->compare('europea_1',$this->europea_1,true);
		$criteria->compare('resto_1',$this->resto_1,true);
		$criteria->compare('p_extran',$this->p_extran,true);
		$criteria->compare('p_africa',$this->p_africa,true);
		$criteria->compare('p_americ',$this->p_americ,true);
		$criteria->compare('p_asiati',$this->p_asiati,true);
		$criteria->compare('p_europe',$this->p_europe,true);
		$criteria->compare('p_resto',$this->p_resto,true);
		$criteria->compare('geom',$this->geom,true);
		$criteria->compare('infancia',$this->infancia,true);
		$criteria->compare('juventud',$this->juventud,true);
		$criteria->compare('vejez',$this->vejez,true);
		$criteria->compare('adultos_25_34',$this->adultos_25_34,true);
		$criteria->compare('adultos_35_44',$this->adultos_35_44,true);
		$criteria->compare('adultos_45_54',$this->adultos_45_54,true);
		$criteria->compare('adultos_55_64',$this->adultos_55_64,true);
		$criteria->compare('adultos_65_74',$this->adultos_65_74,true);
		$criteria->compare('tam_familia',$this->tam_familia,true);
		$criteria->compare('nivel_estudios',$this->nivel_estudios,true);
		$criteria->compare('porc_casados',$this->porc_casados,true);
		$criteria->compare('size_viv',$this->size_viv,true);
		$criteria->compare('rooms_viv',$this->rooms_viv,true);
		$criteria->compare('price_viv',$this->price_viv,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}