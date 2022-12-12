<?php
/* @var $this TblIsoPobController */
/* @var $model TblIsoPob */

$this->breadcrumbs=array(
	'Tbl Iso Pobs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List TblIsoPob', 'url'=>array('index')),
	array('label'=>'Create TblIsoPob', 'url'=>array('create')),
	array('label'=>'Update TblIsoPob', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TblIsoPob', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TblIsoPob', 'url'=>array('admin')),
);
?>

<h1>View TblIsoPob #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_encuesta_zc',
		'secc',
		'p1',
		'p2',
		'p3',
		'p4',
		'p5',
		'p_secc',
	),
)); ?>
