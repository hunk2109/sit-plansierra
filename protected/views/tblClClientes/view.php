<?php
/* @var $this TblClClientesController */
/* @var $model TblClClientes */

$this->breadcrumbs=array(
	'Tbl Cl Clientes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List TblClClientes', 'url'=>array('index')),
	array('label'=>'Create TblClClientes', 'url'=>array('create')),
	array('label'=>'Update TblClClientes', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TblClClientes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TblClClientes', 'url'=>array('admin')),
);
?>

<h1>View TblClClientes #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'fecha',
		'cp',
		'cod_edad',
		'num_clientes',
	),
)); ?>
