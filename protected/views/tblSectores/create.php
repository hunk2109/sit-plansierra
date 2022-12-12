<?php
/* @var $this TblSectoresController */
/* @var $model TblSectores */

$this->breadcrumbs=array(
	'Tbl Sectores'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TblSectores', 'url'=>array('index')),
	array('label'=>'Manage TblSectores', 'url'=>array('admin')),
);
?>

<h1>Create TblSectores</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>