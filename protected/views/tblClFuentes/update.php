<?php
/* @var $this TblClFuentesController */
/* @var $model TblClFuentes */

$this->breadcrumbs=array(
	'Tbl Cl Fuentes'=>array('index'),
	$model->cod_fuente=>array('view','id'=>$model->cod_fuente),
	'Update',
);

$this->menu=array(
	array('label'=>'List TblClFuentes', 'url'=>array('index')),
	array('label'=>'Create TblClFuentes', 'url'=>array('create')),
	array('label'=>'View TblClFuentes', 'url'=>array('view', 'id'=>$model->cod_fuente)),
	array('label'=>'Manage TblClFuentes', 'url'=>array('admin')),
);
?>

<h1>Update TblClFuentes <?php echo $model->cod_fuente; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>