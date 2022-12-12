<?php
/* @var $this TblEtiquetaController */
/* @var $model TblEtiqueta */

$this->breadcrumbs=array(
	'Tbl Etiquetas'=>array('index'),
	$model->id_etiqueta,
);

$this->menu=array(
	array('label'=>'List TblEtiqueta', 'url'=>array('index')),
	array('label'=>'Create TblEtiqueta', 'url'=>array('create')),
	array('label'=>'Update TblEtiqueta', 'url'=>array('update', 'id'=>$model->id_etiqueta)),
	array('label'=>'Delete TblEtiqueta', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_etiqueta),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TblEtiqueta', 'url'=>array('admin')),
);
?>

<h1>View TblEtiqueta #<?php echo $model->id_etiqueta; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_etiqueta',
		'etiqueta',
		'logo',
	),
)); ?>
