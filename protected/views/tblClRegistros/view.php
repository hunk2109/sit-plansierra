<?php
/* @var $this TblClRegistrosController */
/* @var $model TblClRegistros */

$this->breadcrumbs=array(
	'Tbl Cl Registroses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List TblClRegistros', 'url'=>array('index')),
	array('label'=>'Create TblClRegistros', 'url'=>array('create')),
	array('label'=>'Update TblClRegistros', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TblClRegistros', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TblClRegistros', 'url'=>array('admin')),
);
?>

<h1>View TblClRegistros #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'fecha',
		'cp',
		'tipo_fuente',
		'cod_edad',
		'num_clientes',
	),
)); ?>
