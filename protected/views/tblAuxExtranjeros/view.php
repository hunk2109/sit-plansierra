<?php
/* @var $this TblAuxExtranjerosController */
/* @var $model TblAuxExtranjeros */

$this->breadcrumbs=array(
	'Tbl Aux Extranjeroses'=>array('index'),
	$model->id_nacionalidad,
);

$this->menu=array(
	array('label'=>'List TblAuxExtranjeros', 'url'=>array('index')),
	array('label'=>'Create TblAuxExtranjeros', 'url'=>array('create')),
	array('label'=>'Update TblAuxExtranjeros', 'url'=>array('update', 'id'=>$model->id_nacionalidad)),
	array('label'=>'Delete TblAuxExtranjeros', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_nacionalidad),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TblAuxExtranjeros', 'url'=>array('admin')),
);
?>

<h1>View TblAuxExtranjeros #<?php echo $model->id_nacionalidad; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_nacionalidad',
		'desc_nacionalidad',
		'tipo',
		'grupo',
	),
)); ?>
