<?php
/* @var $this TblZonaInfluenciaController */
/* @var $model TblZonaInfluencia */

$this->breadcrumbs=array(
	'Tbl Zona Influencias'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TblZonaInfluencia', 'url'=>array('index')),
	array('label'=>'Manage TblZonaInfluencia', 'url'=>array('admin')),
);
?>

<h1>Create TblZonaInfluencia</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>