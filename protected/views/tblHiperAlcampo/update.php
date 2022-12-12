<?php
/* @var $this TblHiperAlcampoController */
/* @var $model TblHiperAlcampo */

$this->breadcrumbs=array(
	'Tbl Hiper Alcampos'=>array('index'),
	$model->id_hiper_alcampo=>array('view','id'=>$model->id_hiper_alcampo),
	'Update',
);

$this->menu=array(
	array('label'=>'List TblHiperAlcampo', 'url'=>array('index')),
	array('label'=>'Create TblHiperAlcampo', 'url'=>array('create')),
	array('label'=>'View TblHiperAlcampo', 'url'=>array('view', 'id'=>$model->id_hiper_alcampo)),
	array('label'=>'Manage TblHiperAlcampo', 'url'=>array('admin')),
);
?>

<h1>Update TblHiperAlcampo <?php echo $model->id_hiper_alcampo; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>