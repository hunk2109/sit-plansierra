<?php
/* @var $this TblIsoDescController */
/* @var $model TblIsoDesc */

$this->breadcrumbs=array(
	'Tbl Iso Descs'=>array('index'),
	$model->id_iso,
);

$this->menu=array(
	array('label'=>'List TblIsoDesc', 'url'=>array('index')),
	array('label'=>'Create TblIsoDesc', 'url'=>array('create')),
	array('label'=>'Update TblIsoDesc', 'url'=>array('update', 'id'=>$model->id_iso)),
	array('label'=>'Delete TblIsoDesc', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_iso),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TblIsoDesc', 'url'=>array('admin')),
);
?>

<h1>View TblIsoDesc #<?php echo $model->id_iso; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_iso',
		'iso_nom',
	),
)); ?>
