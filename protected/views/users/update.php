<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Users', 'url'=>array('index')),
	array('label'=>'Create Users', 'url'=>array('create')),
	array('label'=>'View Users', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Users', 'url'=>array('admin')),
);
?>
<div id="header">
			<!--
			//***********************************************************************************************************************************
			//***********************************************************************************************************************************
			//
			// LOGO DEL PLAN SIERRA
			-->
			<div class="row">
				<div class="col-md-2" >
					<div id="logo"><a href="index.php"><img src="images/cliente_logo.png" width='100%'></img></a></div>
				</div>
				<div class="col-md-9 >
					<h2  span style="font-style: italic"> </h2>
					<h3 style="color: FireBrick "> Usuarios- Actualizar </h3>
				
				</div>
				<div class="col-md-1" >
											
			
					<!--<div id="logo"><a href="index.php"><img    align="right" src="images/reforestacion.png" width='60%'></img></a></div>-->
				</div>
			</div>
<h1>Usuario nº<?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>