<?php
/* @var $this TblClRegistrosController */
/* @var $model TblClRegistros */

$this->breadcrumbs=array(
	'Tbl Cl Registroses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TblClRegistros', 'url'=>array('index')),
	array('label'=>'Manage TblClRegistros', 'url'=>array('admin')),
);
?>

<h1>Create TblClRegistros</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>