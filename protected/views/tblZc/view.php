<?php
/* @var $this TblZcController */
/* @var $model TblZc */

$this->breadcrumbs=array(
	'Tbl Zcs'=>array('index'),
	$model->cod_zipcode,
);

$this->menu=array(
	array('label'=>'List TblZc', 'url'=>array('index')),
	array('label'=>'Create TblZc', 'url'=>array('create')),
	array('label'=>'Update TblZc', 'url'=>array('update', 'id'=>$model->cod_zipcode)),
	array('label'=>'Delete TblZc', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->cod_zipcode),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TblZc', 'url'=>array('admin')),
);
?>

<h1>View TblZc #<?php echo $model->cod_zipcode; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'cod_zipcode',
		'fecha_ini',
		'fecha_fin',
		'id_alcampo',
		'tipo_zc',
		'cv',
	),
)); ?>
