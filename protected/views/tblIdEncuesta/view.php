<?php
/* @var $this TblIdEncuestaController */
/* @var $model TblIdEncuesta */

$this->breadcrumbs=array(
	'Tbl Id Encuestas'=>array('index'),
	$model->id_encuesta,
);

$this->menu=array(
	array('label'=>'List TblIdEncuesta', 'url'=>array('index')),
	array('label'=>'Create TblIdEncuesta', 'url'=>array('create')),
	array('label'=>'Update TblIdEncuesta', 'url'=>array('update', 'id'=>$model->id_encuesta)),
	array('label'=>'Delete TblIdEncuesta', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_encuesta),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TblIdEncuesta', 'url'=>array('admin')),
);
?>

<h1>View TblIdEncuesta #<?php echo $model->id_encuesta; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'fecha_encuesta',
		'id_alcampo',
		'id_encuesta',
	),
)); ?>
