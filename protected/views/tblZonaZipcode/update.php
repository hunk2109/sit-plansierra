<?php
/* @var $this TblZonaZipcodeController */
/* @var $model TblZonaZipcode */

$this->breadcrumbs=array(
	'Tbl Zona Zipcodes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TblZonaZipcode', 'url'=>array('index')),
	array('label'=>'Create TblZonaZipcode', 'url'=>array('create')),
	array('label'=>'View TblZonaZipcode', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TblZonaZipcode', 'url'=>array('admin')),
);
?>

<h1>Update TblZonaZipcode <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>