<?php
/* @var $this TblMercadoController */
/* @var $model TblMercado */

$this->breadcrumbs=array(
	'Tbl Mercados'=>array('index'),
	$model->id_mercado=>array('view','id'=>$model->id_mercado),
	'Update',
);

$this->menu=array(
	array('label'=>'List TblMercado', 'url'=>array('index')),
	array('label'=>'Create TblMercado', 'url'=>array('create')),
	array('label'=>'View TblMercado', 'url'=>array('view', 'id'=>$model->id_mercado)),
	array('label'=>'Manage TblMercado', 'url'=>array('admin')),
);
?>

<h1>Update TblMercado <?php echo $model->id_mercado; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>