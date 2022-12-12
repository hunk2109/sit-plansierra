<?php
/* @var $this TblHogaresController */
/* @var $model TblHogares */

$this->breadcrumbs=array(
	'Tbl Hogares'=>array('index'),
	$model->cpro,
);

$this->menu=array(
	array('label'=>'List TblHogares', 'url'=>array('index')),
	array('label'=>'Create TblHogares', 'url'=>array('create')),
	array('label'=>'Update TblHogares', 'url'=>array('update', 'id'=>$model->cpro)),
	array('label'=>'Delete TblHogares', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->cpro),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TblHogares', 'url'=>array('admin')),
);
?>

<h1>View TblHogares #<?php echo $model->cpro; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'cpro',
		'nombre',
		'personas',
	),
)); ?>
