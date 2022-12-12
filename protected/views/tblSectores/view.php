<?php
/* @var $this TblSectoresController */
/* @var $model TblSectores */

$this->breadcrumbs=array(
	'Tbl Sectores'=>array('index'),
	$model->id_sector,
);

$this->menu=array(
	array('label'=>'List TblSectores', 'url'=>array('index')),
	array('label'=>'Create TblSectores', 'url'=>array('create')),
	array('label'=>'Update TblSectores', 'url'=>array('update', 'id'=>$model->id_sector)),
	array('label'=>'Delete TblSectores', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_sector),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TblSectores', 'url'=>array('admin')),
);
?>

<h1>View TblSectores #<?php echo $model->id_sector; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_sector',
		'desc_sector',
	),
)); ?>
