<?php
/* @var $this GeoCpController */
/* @var $model GeoCp */

$this->breadcrumbs=array(
	'Geo Cps'=>array('index'),
	$model->gid,
);

$this->menu=array(
	array('label'=>'List GeoCp', 'url'=>array('index')),
	array('label'=>'Create GeoCp', 'url'=>array('create')),
	array('label'=>'Update GeoCp', 'url'=>array('update', 'id'=>$model->gid)),
	array('label'=>'Delete GeoCp', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->gid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage GeoCp', 'url'=>array('admin')),
);
?>

<h1>View GeoCp #<?php echo $model->gid; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'gid',
		'cp',
		'sum_pob',
		'geom',
	),
)); ?>
