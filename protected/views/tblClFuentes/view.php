<?php
/* @var $this TblClFuentesController */
/* @var $model TblClFuentes */

$this->breadcrumbs=array(
	'Tbl Cl Fuentes'=>array('index'),
	$model->cod_fuente,
);

$this->menu=array(
	array('label'=>'List TblClFuentes', 'url'=>array('index')),
	array('label'=>'Create TblClFuentes', 'url'=>array('create')),
	array('label'=>'Update TblClFuentes', 'url'=>array('update', 'id'=>$model->cod_fuente)),
	array('label'=>'Delete TblClFuentes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->cod_fuente),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TblClFuentes', 'url'=>array('admin')),
);
?>

<h1>View TblClFuentes #<?php echo $model->cod_fuente; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'cod_fuente',
		'desc_fuente',
	),
)); ?>
