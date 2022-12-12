<?php
/* @var $this TblZcConsolidadoController */
/* @var $model TblZcConsolidado */

$this->breadcrumbs=array(
	'Tbl Zc Consolidados'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TblZcConsolidado', 'url'=>array('index')),
	array('label'=>'Create TblZcConsolidado', 'url'=>array('create')),
	array('label'=>'View TblZcConsolidado', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TblZcConsolidado', 'url'=>array('admin')),
);
?>

<h1>Update TblZcConsolidado <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>