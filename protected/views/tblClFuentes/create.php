<?php
/* @var $this TblClFuentesController */
/* @var $model TblClFuentes */

$this->breadcrumbs=array(
	'Tbl Cl Fuentes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TblClFuentes', 'url'=>array('index')),
	array('label'=>'Manage TblClFuentes', 'url'=>array('admin')),
);
?>

<h1>Create TblClFuentes</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>