<?php
/* @var $this TblEncuestaInfluenciaController */
/* @var $model TblEncuestaInfluencia */

$this->breadcrumbs=array(
	'Tbl Encuesta Influencias'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List TblEncuestaInfluencia', 'url'=>array('index')),
	array('label'=>'Create TblEncuestaInfluencia', 'url'=>array('create')),
	array('label'=>'Update TblEncuestaInfluencia', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TblEncuestaInfluencia', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TblEncuestaInfluencia', 'url'=>array('admin')),
);
?>

<h1>View TblEncuestaInfluencia #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_encuesta',
		'registro_encuesta',
		'p1',
		'p2',
		'p3',
		'cp',
		'loc_mkt',
		'ponderacion',
	),
)); ?>
