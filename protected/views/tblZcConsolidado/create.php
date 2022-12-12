<?php
/* @var $this TblZcConsolidadoController */
/* @var $model TblZcConsolidado */

$this->breadcrumbs=array(
	'Tbl Zc Consolidados'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TblZcConsolidado', 'url'=>array('index')),
	array('label'=>'Manage TblZcConsolidado', 'url'=>array('admin')),
);
?>

<h1>Create TblZcConsolidado</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>