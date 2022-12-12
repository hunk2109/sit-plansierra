<?php
/* @var $this TblIsoDescController */
/* @var $model TblIsoDesc */

$this->breadcrumbs=array(
	'Tbl Iso Descs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TblIsoDesc', 'url'=>array('index')),
	array('label'=>'Manage TblIsoDesc', 'url'=>array('admin')),
);
?>

<h1>Create TblIsoDesc</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>