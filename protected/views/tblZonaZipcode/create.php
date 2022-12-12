<?php
/* @var $this TblZonaZipcodeController */
/* @var $model TblZonaZipcode */

$this->breadcrumbs=array(
	'Tbl Zona Zipcodes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TblZonaZipcode', 'url'=>array('index')),
	array('label'=>'Manage TblZonaZipcode', 'url'=>array('admin')),
);
?>

<h1>Create TblZonaZipcode</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>