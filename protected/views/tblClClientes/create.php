<?php
/* @var $this TblClClientesController */
/* @var $model TblClClientes */

$this->breadcrumbs=array(
	'Tbl Cl Clientes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TblClClientes', 'url'=>array('index')),
	array('label'=>'Manage TblClClientes', 'url'=>array('admin')),
);
?>

<h1>Create TblClClientes</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>