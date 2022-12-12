<?php
/* @var $this TblHogaresController */
/* @var $model TblHogares */

$this->breadcrumbs=array(
	'Tbl Hogares'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TblHogares', 'url'=>array('index')),
	array('label'=>'Manage TblHogares', 'url'=>array('admin')),
);
?>

<h1>Create TblHogares</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>