<?php
/* @var $this TblPoblaAisController */
/* @var $model TblPoblaAis */

$this->breadcrumbs=array(
	'Tbl Pobla Aises'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List TblPoblaAis', 'url'=>array('index')),
	array('label'=>'Create TblPoblaAis', 'url'=>array('create')),
	array('label'=>'Update TblPoblaAis', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TblPoblaAis', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TblPoblaAis', 'url'=>array('admin')),
);
?>

<h1>View TblPoblaAis #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'seccion',
		'habitantes',
		'familias',
		'a',
		'b',
		'c',
		'd',
		'e',
		'f',
		'g',
		'h',
		'i',
		'j',
		'k',
		'l',
		'm',
		'n',
		'o',
		'p',
		'q',
		'r',
		'a_por',
		'b_por',
		'c_por',
		'd_por',
		'e_por',
		'f_por',
		'g_por',
		'h_por',
		'i_por',
		'j_por',
		'k_por',
		'l_por',
		'm_por',
		'n_por',
		'o_por',
		'p_por',
		'q_por',
		'r_por',
		'id',
	),
)); ?>
