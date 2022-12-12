<?php
/* @var $this TblRotuloController */
/* @var $model TblRotulo */

$this->breadcrumbs=array(
	'Tbl Rotulos'=>array('index'),
	$model->id_rotulo,
);

$this->menu=array(
	array('label'=>'List TblRotulo', 'url'=>array('index')),
	array('label'=>'Create TblRotulo', 'url'=>array('create')),
	array('label'=>'Update TblRotulo', 'url'=>array('update', 'id'=>$model->id_rotulo)),
	array('label'=>'Delete TblRotulo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_rotulo),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TblRotulo', 'url'=>array('admin')),
);
?>

<h1>View TblRotulo #<?php echo $model->id_rotulo; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_rotulo',
		'rotulo',
		'logo',
		'id_etiqueta',
	),
)); ?>
