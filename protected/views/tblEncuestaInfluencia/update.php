<?php
/* @var $this TblEncuestaInfluenciaController */
/* @var $model TblEncuestaInfluencia */

$this->breadcrumbs=array(
	'Tbl Encuesta Influencias'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TblEncuestaInfluencia', 'url'=>array('index')),
	array('label'=>'Create TblEncuestaInfluencia', 'url'=>array('create')),
	array('label'=>'View TblEncuestaInfluencia', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TblEncuestaInfluencia', 'url'=>array('admin')),
);
?>

<h1>Update TblEncuestaInfluencia <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>