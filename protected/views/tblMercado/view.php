<?php
/* @var $this TblMercadoController */
/* @var $model TblMercado */

$this->breadcrumbs=array(
	'Tbl Mercados'=>array('index'),
	$model->id_mercado,
);

$this->menu=array(
	array('label'=>'List TblMercado', 'url'=>array('index')),
	array('label'=>'Create TblMercado', 'url'=>array('create')),
	array('label'=>'Update TblMercado', 'url'=>array('update', 'id'=>$model->id_mercado)),
	array('label'=>'Delete TblMercado', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_mercado),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TblMercado', 'url'=>array('admin')),
);
?>

<h1>View TblMercado #<?php echo $model->id_mercado; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_mercado',
		'desc_mercado',
		'id_sector',
	),
)); ?>
