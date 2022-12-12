<?php
/* @var $this TblZonaZipcodeController */
/* @var $model TblZonaZipcode */

$this->breadcrumbs=array(
	'Tbl Zona Zipcodes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List TblZonaZipcode', 'url'=>array('index')),
	array('label'=>'Create TblZonaZipcode', 'url'=>array('create')),
	array('label'=>'Update TblZonaZipcode', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TblZonaZipcode', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TblZonaZipcode', 'url'=>array('admin')),
);
?>

<h1>View TblZonaZipcode #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_hiper_alcampo',
		'cp',
	),
)); ?>
