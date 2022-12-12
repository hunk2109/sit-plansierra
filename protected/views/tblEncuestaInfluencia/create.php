<?php
/* @var $this TblEncuestaInfluenciaController */
/* @var $model TblEncuestaInfluencia */

$this->breadcrumbs=array(
	'Tbl Encuesta Influencias'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TblEncuestaInfluencia', 'url'=>array('index')),
	array('label'=>'Manage TblEncuestaInfluencia', 'url'=>array('admin')),
);
?>

<h1>Create TblEncuestaInfluencia</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>