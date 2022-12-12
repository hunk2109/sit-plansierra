<?php
/* @var $this TblZipcodeMercadosController */
/* @var $model TblZipcodeMercados */

$this->breadcrumbs=array(
	'Tbl Zipcode Mercadoses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List TblZipcodeMercados', 'url'=>array('index')),
	array('label'=>'Create TblZipcodeMercados', 'url'=>array('create')),
	array('label'=>'Update TblZipcodeMercados', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TblZipcodeMercados', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TblZipcodeMercados', 'url'=>array('admin')),
);
?>

<h1>View TblZipcodeMercados #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_consulta_en_cp',
		'id_mercado',
		'cv',
		'caddy',
	),
)); ?>
