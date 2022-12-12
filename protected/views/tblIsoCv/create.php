<?php
/* @var $this TblIsoCvController */
/* @var $model TblIsoCv */

$this->breadcrumbs=array(
	'Tbl Iso Cvs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TblIsoCv', 'url'=>array('index')),
	array('label'=>'Manage TblIsoCv', 'url'=>array('admin')),
);
?>

<h1>Create TblIsoCv</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>