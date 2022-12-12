<?php
/* @var $this TblSectoresController */
/* @var $model TblSectores */

$this->breadcrumbs=array(
	'Tbl Sectores'=>array('index'),
	$model->id_sector=>array('view','id'=>$model->id_sector),
	'Update',
);

$this->menu=array(
	array('label'=>'List TblSectores', 'url'=>array('index')),
	array('label'=>'Create TblSectores', 'url'=>array('create')),
	array('label'=>'View TblSectores', 'url'=>array('view', 'id'=>$model->id_sector)),
	array('label'=>'Manage TblSectores', 'url'=>array('admin')),
);
?>

<h1>Update TblSectores <?php echo $model->id_sector; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>