<?php
/* @var $this TblIsoCvController */
/* @var $model TblIsoCv */

$this->breadcrumbs=array(
	'Tbl Iso Cvs'=>array('index'),
	$model->id_iso_cv_zc,
);

$this->menu=array(
	array('label'=>'List TblIsoCv', 'url'=>array('index')),
	array('label'=>'Create TblIsoCv', 'url'=>array('create')),
	array('label'=>'Update TblIsoCv', 'url'=>array('update', 'id'=>$model->id_iso_cv_zc)),
	array('label'=>'Delete TblIsoCv', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_iso_cv_zc),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TblIsoCv', 'url'=>array('admin')),
);
?>

<h1>View TblIsoCv #<?php echo $model->id_iso_cv_zc; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_iso_cv_zc',
		'id_encuesta_zc',
		'iso',
		'cv',
	),
)); ?>
