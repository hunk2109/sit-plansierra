<?php
/* @var $this TblEtiquetaController */
/* @var $model TblEtiqueta */

$this->breadcrumbs=array(
	'Tbl Etiquetas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TblEtiqueta', 'url'=>array('index')),
	array('label'=>'Manage TblEtiqueta', 'url'=>array('admin')),
);
?>

<h1>Create TblEtiqueta</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>