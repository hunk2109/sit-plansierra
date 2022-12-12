<?php
/* @var $this TblEtiquetaController */
/* @var $model TblEtiqueta */

$this->breadcrumbs=array(
	'Tbl Etiquetas'=>array('index'),
	$model->id_etiqueta=>array('view','id'=>$model->id_etiqueta),
	'Update',
);

$this->menu=array(
	array('label'=>'List TblEtiqueta', 'url'=>array('index')),
	array('label'=>'Create TblEtiqueta', 'url'=>array('create')),
	array('label'=>'View TblEtiqueta', 'url'=>array('view', 'id'=>$model->id_etiqueta)),
	array('label'=>'Manage TblEtiqueta', 'url'=>array('admin')),
);
?>

<h1>Update TblEtiqueta <?php echo $model->id_etiqueta; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>