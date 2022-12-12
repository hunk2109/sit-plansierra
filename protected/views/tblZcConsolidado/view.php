<?php
/* @var $this TblZcConsolidadoController */
/* @var $model TblZcConsolidado */

$this->breadcrumbs=array(
	'Tbl Zc Consolidados'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List TblZcConsolidado', 'url'=>array('index')),
	array('label'=>'Create TblZcConsolidado', 'url'=>array('create')),
	array('label'=>'Update TblZcConsolidado', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TblZcConsolidado', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TblZcConsolidado', 'url'=>array('admin')),
);
?>

<h1>View TblZcConsolidado #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'cod_zipcode',
		'cp',
		'venta_si',
		'venta_no',
		'venta_ns',
		'folleto_si',
		'folleto_no',
		'folleto_ns',
	),
)); ?>
