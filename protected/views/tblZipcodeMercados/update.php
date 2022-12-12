<?php
/* @var $this TblZipcodeMercadosController */
/* @var $model TblZipcodeMercados */

$this->breadcrumbs=array(
	'Tbl Zipcode Mercadoses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TblZipcodeMercados', 'url'=>array('index')),
	array('label'=>'Create TblZipcodeMercados', 'url'=>array('create')),
	array('label'=>'View TblZipcodeMercados', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TblZipcodeMercados', 'url'=>array('admin')),
);
?>

<h1>Update TblZipcodeMercados <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>