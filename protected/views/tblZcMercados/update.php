<?php
/* @var $this TblZcMercadosController */
/* @var $model TblZcMercados */

$this->breadcrumbs=array(
	'Tbl Zc Mercadoses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TblZcMercados', 'url'=>array('index')),
	array('label'=>'Create TblZcMercados', 'url'=>array('create')),
	array('label'=>'View TblZcMercados', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TblZcMercados', 'url'=>array('admin')),
);
?>

<h1>Update TblZcMercados <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>