<?php
/* @var $this TblHogaresController */
/* @var $model TblHogares */

$this->breadcrumbs=array(
	'Tbl Hogares'=>array('index'),
	$model->cpro=>array('view','id'=>$model->cpro),
	'Update',
);

$this->menu=array(
	array('label'=>'List TblHogares', 'url'=>array('index')),
	array('label'=>'Create TblHogares', 'url'=>array('create')),
	array('label'=>'View TblHogares', 'url'=>array('view', 'id'=>$model->cpro)),
	array('label'=>'Manage TblHogares', 'url'=>array('admin')),
);
?>

<h1>Update TblHogares <?php echo $model->cpro; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>