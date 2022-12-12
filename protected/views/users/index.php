<?php
/* @var $this UsersController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Usuarios del Sistema de infromacion Geográfica de  Plan Sierra',
);

$this->menu=array(
	array('label'=>'Create Users', 'url'=>array('create')),
	array('label'=>'Manage Users', 'url'=>array('admin')),
	
);
?>
			<div id="header">
			<!--
			//***********************************************************************************************************************************
			//***********************************************************************************************************************************
			//
			// LOGO DEL PLN SIERRA
			-->
			
			<div class="row">
											
				
				
				
				<div class="col-md-2" >
											
			
					<div id="logo"><a href="index.php"><img src="images/cliente_logo.png" width='100%'></img></a></div>
				</div>
				
				<div class="col-md-9 >
					<h2  span style="font-style: italic"> </h2>
					<h3 style="color: FireBrick "> Usuarios </h3>
				
				</div>
				<div class="col-md-1" >
											
			
					<!--<div id="logo"><a href="index.php"><img    align="right" src="images/reforestacion.png" width='60%'></img></a></div>-->
				</div>
			</div>
			


<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
