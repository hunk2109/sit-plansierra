<?php

/**
 * This is the model class for table "tbl_pobla_ais".
 *
 * The followings are the available columns in table 'tbl_pobla_ais':
 * @property string $seccion
 * @property string $habitantes
 * @property string $familias
 * @property string $a
 * @property string $b
 * @property string $c
 * @property string $d
 * @property string $e
 * @property string $f
 * @property string $g
 * @property string $h
 * @property string $i
 * @property string $j
 * @property string $k
 * @property string $l
 * @property string $m
 * @property string $n
 * @property string $o
 * @property string $p
 * @property string $q
 * @property string $r
 * @property string $a_por
 * @property string $b_por
 * @property string $c_por
 * @property string $d_por
 * @property string $e_por
 * @property string $f_por
 * @property string $g_por
 * @property string $h_por
 * @property string $i_por
 * @property string $j_por
 * @property string $k_por
 * @property string $l_por
 * @property string $m_por
 * @property string $n_por
 * @property string $o_por
 * @property string $p_por
 * @property string $q_por
 * @property string $r_por
 * @property integer $id
 */
class TblPoblaAis extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TblPoblaAis the static model class
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
		return 'tbl_pobla_ais';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('seccion, habitantes, familias, a, b, c, d, e, f, g, h, i, j, k, l, m, n, o, p, q, r, a_por, b_por, c_por, d_por, e_por, f_por, g_por, h_por, i_por, j_por, k_por, l_por, m_por, n_por, o_por, p_por, q_por, r_por', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('seccion, habitantes, familias, a, b, c, d, e, f, g, h, i, j, k, l, m, n, o, p, q, r, a_por, b_por, c_por, d_por, e_por, f_por, g_por, h_por, i_por, j_por, k_por, l_por, m_por, n_por, o_por, p_por, q_por, r_por, id', 'safe', 'on'=>'search'),
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
			'seccion' => 'Seccion',
			'habitantes' => 'Habitantes',
			'familias' => 'Familias',
			'a' => 'A',
			'b' => 'B',
			'c' => 'C',
			'd' => 'D',
			'e' => 'E',
			'f' => 'F',
			'g' => 'G',
			'h' => 'H',
			'i' => 'I',
			'j' => 'J',
			'k' => 'K',
			'l' => 'L',
			'm' => 'M',
			'n' => 'N',
			'o' => 'O',
			'p' => 'P',
			'q' => 'Q',
			'r' => 'R',
			'a_por' => 'A Por',
			'b_por' => 'B Por',
			'c_por' => 'C Por',
			'd_por' => 'D Por',
			'e_por' => 'E Por',
			'f_por' => 'F Por',
			'g_por' => 'G Por',
			'h_por' => 'H Por',
			'i_por' => 'I Por',
			'j_por' => 'J Por',
			'k_por' => 'K Por',
			'l_por' => 'L Por',
			'm_por' => 'M Por',
			'n_por' => 'N Por',
			'o_por' => 'O Por',
			'p_por' => 'P Por',
			'q_por' => 'Q Por',
			'r_por' => 'R Por',
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

		$criteria->compare('seccion',$this->seccion,true);
		$criteria->compare('habitantes',$this->habitantes,true);
		$criteria->compare('familias',$this->familias,true);
		$criteria->compare('a',$this->a,true);
		$criteria->compare('b',$this->b,true);
		$criteria->compare('c',$this->c,true);
		$criteria->compare('d',$this->d,true);
		$criteria->compare('e',$this->e,true);
		$criteria->compare('f',$this->f,true);
		$criteria->compare('g',$this->g,true);
		$criteria->compare('h',$this->h,true);
		$criteria->compare('i',$this->i,true);
		$criteria->compare('j',$this->j,true);
		$criteria->compare('k',$this->k,true);
		$criteria->compare('l',$this->l,true);
		$criteria->compare('m',$this->m,true);
		$criteria->compare('n',$this->n,true);
		$criteria->compare('o',$this->o,true);
		$criteria->compare('p',$this->p,true);
		$criteria->compare('q',$this->q,true);
		$criteria->compare('r',$this->r,true);
		$criteria->compare('a_por',$this->a_por,true);
		$criteria->compare('b_por',$this->b_por,true);
		$criteria->compare('c_por',$this->c_por,true);
		$criteria->compare('d_por',$this->d_por,true);
		$criteria->compare('e_por',$this->e_por,true);
		$criteria->compare('f_por',$this->f_por,true);
		$criteria->compare('g_por',$this->g_por,true);
		$criteria->compare('h_por',$this->h_por,true);
		$criteria->compare('i_por',$this->i_por,true);
		$criteria->compare('j_por',$this->j_por,true);
		$criteria->compare('k_por',$this->k_por,true);
		$criteria->compare('l_por',$this->l_por,true);
		$criteria->compare('m_por',$this->m_por,true);
		$criteria->compare('n_por',$this->n_por,true);
		$criteria->compare('o_por',$this->o_por,true);
		$criteria->compare('p_por',$this->p_por,true);
		$criteria->compare('q_por',$this->q_por,true);
		$criteria->compare('r_por',$this->r_por,true);
		$criteria->compare('id',$this->id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}