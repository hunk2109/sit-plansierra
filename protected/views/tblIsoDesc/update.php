<?php
/* @var $this TblIsoDescController */
/* @var $model TblIsoDesc */

$this->breadcrumbs=array(
	'Tbl Iso Descs'=>array('index'),
	$model->id_iso=>array('view','id'=>$model->id_iso),
	'Update',
);

$this->menu=array(
	array('label'=>'List TblIsoDesc', 'url'=>array('index')),
	array('label'=>'Create TblIsoDesc', 'url'=>array('create')),
	array('label'=>'View TblIsoDesc', 'url'=>array('view', 'id'=>$model->id_iso)),
	array('label'=>'Manage TblIsoDesc', 'url'=>array('admin')),
);
?>

<h1>Update TblIsoDesc <?php echo $model->id_iso; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>