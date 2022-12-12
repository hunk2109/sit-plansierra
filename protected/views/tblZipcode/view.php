<?php
/* @var $this TblZipcodeController */
/* @var $model TblZipcode */

$this->breadcrumbs=array(
	'Tbl Zipcodes'=>array('index'),
	$model->id_consulta_por_cp,
);

$this->menu=array(
	array('label'=>'List TblZipcode', 'url'=>array('index')),
	array('label'=>'Create TblZipcode', 'url'=>array('create')),
	array('label'=>'Update TblZipcode', 'url'=>array('update', 'id'=>$model->id_consulta_por_cp)),
	array('label'=>'Delete TblZipcode', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_consulta_por_cp),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TblZipcode', 'url'=>array('admin')),
);
?>

<h1>View TblZipcode #<?php echo $model->id_consulta_por_cp; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_consulta_por_cp',
		'id_encuesta_zc',
		'cp',
		'cv',
		'caddy',
		'pasos',
		'folleto',
	),
)); ?>
