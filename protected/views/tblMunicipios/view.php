<?php
/* @var $this TblMunicipiosController */
/* @var $model TblMunicipios */

$this->breadcrumbs=array(
	'Tbl Municipioses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List TblMunicipios', 'url'=>array('index')),
	array('label'=>'Create TblMunicipios', 'url'=>array('create')),
	array('label'=>'Update TblMunicipios', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TblMunicipios', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TblMunicipios', 'url'=>array('admin')),
);
?>

<h1>View TblMunicipios #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'cod_mun',
		'desc_mun',
	),
)); ?>
