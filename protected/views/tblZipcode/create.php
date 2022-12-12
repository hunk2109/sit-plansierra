<?php
/* @var $this TblZipcodeController */
/* @var $model TblZipcode */

$this->breadcrumbs=array(
	'Tbl Zipcodes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TblZipcode', 'url'=>array('index')),
	array('label'=>'Manage TblZipcode', 'url'=>array('admin')),
);
?>

<h1>Create TblZipcode</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>