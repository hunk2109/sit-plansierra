<?php
/* @var $this TblMercadoController */
/* @var $model TblMercado */

$this->breadcrumbs=array(
	'Tbl Mercados'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TblMercado', 'url'=>array('index')),
	array('label'=>'Manage TblMercado', 'url'=>array('admin')),
);
?>

<h1>Create TblMercado</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>