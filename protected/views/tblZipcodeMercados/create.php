<?php
/* @var $this TblZipcodeMercadosController */
/* @var $model TblZipcodeMercados */

$this->breadcrumbs=array(
	'Tbl Zipcode Mercadoses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TblZipcodeMercados', 'url'=>array('index')),
	array('label'=>'Manage TblZipcodeMercados', 'url'=>array('admin')),
);
?>

<h1>Create TblZipcodeMercados</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>