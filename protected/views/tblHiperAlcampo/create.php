<?php
/* @var $this TblHiperAlcampoController */
/* @var $model TblHiperAlcampo */

$this->breadcrumbs=array(
	'Tbl Hiper Alcampos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TblHiperAlcampo', 'url'=>array('index')),
	array('label'=>'Manage TblHiperAlcampo', 'url'=>array('admin')),
);
?>

<h1>Create TblHiperAlcampo</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>