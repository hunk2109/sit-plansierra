<?php
/* @var $this TblCodigoMktController */
/* @var $model TblCodigoMkt */

$this->breadcrumbs=array(
	'Tbl Codigo Mkts'=>array('index'),
	'Crear',
);

/*$this->menu=array(
	array('label'=>'List TblCodigoMkt', 'url'=>array('index')),
	array('label'=>'Manage TblCodigoMkt', 'url'=>array('admin')),
);*/
?>
<div id="header">
	<center><div id="logo"><a href='index.php'><img src="images/sigma_icon.png" width='10%'></img></a></div></center>
	<center><h2>Crear Código Mkt</h2></center>	
</div><!-- header -->


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>