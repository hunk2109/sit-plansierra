<?php
/* @var $this TblZonaInfluenciaController */
/* @var $model TblZonaInfluencia */

$this->breadcrumbs=array(
	'Tbl Zona Influencias'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TblZonaInfluencia', 'url'=>array('index')),
	array('label'=>'Create TblZonaInfluencia', 'url'=>array('create')),
	array('label'=>'View TblZonaInfluencia', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TblZonaInfluencia', 'url'=>array('admin')),
);
?>

<h1>Update TblZonaInfluencia <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>