<?php
/* @var $this TblTipoEstabController */
/* @var $model TblTipoEstab */

$this->breadcrumbs=array(
	'Tbl Tipo Estabs'=>array('index'),
	$model->tipo,
);

$this->menu=array(
	array('label'=>'List TblTipoEstab', 'url'=>array('index')),
	array('label'=>'Create TblTipoEstab', 'url'=>array('create')),
	array('label'=>'Update TblTipoEstab', 'url'=>array('update', 'id'=>$model->tipo)),
	array('label'=>'Delete TblTipoEstab', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->tipo),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TblTipoEstab', 'url'=>array('admin')),
);
?>

<h1>View TblTipoEstab #<?php echo $model->tipo; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'tipo',
		'desc',
	),
)); ?>
