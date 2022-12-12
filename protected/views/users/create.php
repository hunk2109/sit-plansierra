<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Users', 'url'=>array('index')),
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
					<h3 style="color: FireBrick "> Usuarios - Crear</h3>
				
				</div>
				<div class="col-md-1" >
											
			
					<!--<div id="logo"><a href="index.php"><img    align="right" src="images/reforestacion.png" width='60%'></img></a></div>-->
				</div>
			</div>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>