<?php
/* @var $this TblClClientesController */
/* @var $model TblClClientes */

$this->breadcrumbs=array(
	'Tbl Cl Clientes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TblClClientes', 'url'=>array('index')),
	array('label'=>'Create TblClClientes', 'url'=>array('create')),
	array('label'=>'View TblClClientes', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TblClClientes', 'url'=>array('admin')),
);
?>

<h1>Update TblClClientes <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>