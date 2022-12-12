<?php
/* @var $this TblCodigoMktController */
/* @var $model TblCodigoMkt */

$this->breadcrumbs=array(
	'Tbl Codigo Mkts'=>array('index'),
	$model->codigo,
);

$this->menu=array(
	array('label'=>'List TblCodigoMkt', 'url'=>array('index')),
	array('label'=>'Create TblCodigoMkt', 'url'=>array('create')),
	array('label'=>'Update TblCodigoMkt', 'url'=>array('update', 'id'=>$model->codigo)),
	array('label'=>'Delete TblCodigoMkt', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->codigo),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TblCodigoMkt', 'url'=>array('admin')),
);
?>

<h1>View TblCodigoMkt #<?php echo $model->codigo; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'codigo',
		'tipo',
		'nielssen',
		'etiqueta',
		'observ',
	),
)); ?>
