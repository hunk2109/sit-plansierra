<?php
/* @var $this TblEcomController */
/* @var $model TblEcom */

$this->breadcrumbs=array(
	'Tbl Ecoms'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List TblEcom', 'url'=>array('index')),
	array('label'=>'Create TblEcom', 'url'=>array('create')),
	array('label'=>'Update TblEcom', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TblEcom', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TblEcom', 'url'=>array('admin')),
);
?>

<h1>View TblEcom #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'fecha',
		'id_hiper',
		'cp',
		'cv',
		'tipo_entrega',
		'num_pedidos',
		'clientes_unicos',
	),
)); ?>
