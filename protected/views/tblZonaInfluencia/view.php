<?php
/* @var $this TblZonaInfluenciaController */
/* @var $model TblZonaInfluencia */

$this->breadcrumbs=array(
	'Tbl Zona Influencias'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List TblZonaInfluencia', 'url'=>array('index')),
	array('label'=>'Create TblZonaInfluencia', 'url'=>array('create')),
	array('label'=>'Update TblZonaInfluencia', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TblZonaInfluencia', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TblZonaInfluencia', 'url'=>array('admin')),
);
?>

<h1>View TblZonaInfluencia #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_hiper_alcampo',
		'id_tipo_zi',
		'loc',
	),
)); ?>
