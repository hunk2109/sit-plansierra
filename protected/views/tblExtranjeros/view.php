<?php
/* @var $this TblExtranjerosController */
/* @var $model TblExtranjeros */

$this->breadcrumbs=array(
	'Tbl Extranjeroses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List TblExtranjeros', 'url'=>array('index')),
	array('label'=>'Create TblExtranjeros', 'url'=>array('create')),
	array('label'=>'Update TblExtranjeros', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TblExtranjeros', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TblExtranjeros', 'url'=>array('admin')),
);
?>

<h1>View TblExtranjeros #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'seccion',
		'nacionalidad',
		'poblacion',
	),
)); ?>
