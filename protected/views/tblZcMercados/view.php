<?php
/* @var $this TblZcMercadosController */
/* @var $model TblZcMercados */

$this->breadcrumbs=array(
	'Tbl Zc Mercadoses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List TblZcMercados', 'url'=>array('index')),
	array('label'=>'Create TblZcMercados', 'url'=>array('create')),
	array('label'=>'Update TblZcMercados', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TblZcMercados', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TblZcMercados', 'url'=>array('admin')),
);
?>

<h1>View TblZcMercados #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'cod_zipcode',
		'id_mercado',
		'cp',
		'venta_si',
		'venta_no',
		'venta_ns',
		'folleto_si',
		'folleto_no',
		'folleto_ns',
	),
)); ?>
