<?php
/* @var $this AccionesController */
/* @var $model Acciones */

$this->breadcrumbs=array(
	'Acciones'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Acciones', 'url'=>array('index')),
	array('label'=>'Create Acciones', 'url'=>array('create')),
	array('label'=>'Update Acciones', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Acciones', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Acciones', 'url'=>array('admin')),
);
?>

<h1>View Acciones #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'grupo',
		'accion',
	),
)); ?>
