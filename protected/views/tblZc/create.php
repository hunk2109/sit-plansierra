<?php
/* @var $this TblZcController */
/* @var $model TblZc */

$this->breadcrumbs=array(
	'Tbl Zcs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TblZc', 'url'=>array('index')),
	array('label'=>'Manage TblZc', 'url'=>array('admin')),
);
?>

<h1>Create TblZc</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>