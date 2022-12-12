<?php
/* @var $this TblHiperAlcampoController */
/* @var $model TblHiperAlcampo */

$this->breadcrumbs=array(
	'Tbl Hiper Alcampos'=>array('index'),
	$model->id_hiper_alcampo,
);

$this->menu=array(
	array('label'=>'List TblHiperAlcampo', 'url'=>array('index')),
	array('label'=>'Create TblHiperAlcampo', 'url'=>array('create')),
	array('label'=>'Update TblHiperAlcampo', 'url'=>array('update', 'id'=>$model->id_hiper_alcampo)),
	array('label'=>'Delete TblHiperAlcampo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_hiper_alcampo),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TblHiperAlcampo', 'url'=>array('admin')),
);
?>

<h1>View TblHiperAlcampo #<?php echo $model->id_hiper_alcampo; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_hiper_alcampo',
		'cod_nielssen',
		'nombre',
		'region',
	),
)); ?>
