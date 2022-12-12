<?php
/* @var $this TblZipcodeController */
/* @var $model TblZipcode */

$this->breadcrumbs=array(
	'Tbl Zipcodes'=>array('index'),
	$model->id_consulta_por_cp=>array('view','id'=>$model->id_consulta_por_cp),
	'Update',
);

$this->menu=array(
	array('label'=>'List TblZipcode', 'url'=>array('index')),
	array('label'=>'Create TblZipcode', 'url'=>array('create')),
	array('label'=>'View TblZipcode', 'url'=>array('view', 'id'=>$model->id_consulta_por_cp)),
	array('label'=>'Manage TblZipcode', 'url'=>array('admin')),
);
?>

<h1>Update TblZipcode <?php echo $model->id_consulta_por_cp; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>