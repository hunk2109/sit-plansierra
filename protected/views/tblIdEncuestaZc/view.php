<?php
/* @var $this TblIdEncuestaZcController */
/* @var $model TblIdEncuestaZc */

$this->breadcrumbs=array(
	'Tbl Id Encuesta Zcs'=>array('index'),
	$model->id_encuesta_zc,
);

$this->menu=array(
	array('label'=>'List TblIdEncuestaZc', 'url'=>array('index')),
	array('label'=>'Create TblIdEncuestaZc', 'url'=>array('create')),
	array('label'=>'Update TblIdEncuestaZc', 'url'=>array('update', 'id'=>$model->id_encuesta_zc)),
	array('label'=>'Delete TblIdEncuestaZc', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_encuesta_zc),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TblIdEncuestaZc', 'url'=>array('admin')),
);
?>

<h1>View TblIdEncuestaZc #<?php echo $model->id_encuesta_zc; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_encuesta_zc',
		'fecha_ini',
		'fecha_fin',
		'id_hiper_alcampo',
		'tipo_zc',
		'cv',
	),
)); ?>
