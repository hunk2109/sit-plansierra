<?php
/* @var $this TblZcMercadosController */
/* @var $model TblZcMercados */

$this->breadcrumbs=array(
	'Tbl Zc Mercadoses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TblZcMercados', 'url'=>array('index')),
	array('label'=>'Manage TblZcMercados', 'url'=>array('admin')),
);
?>

<h1>Create TblZcMercados</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>