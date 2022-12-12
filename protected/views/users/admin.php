<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Users', 'url'=>array('index')),
	array('label'=>'Create Users', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('users-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
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
					<h3 style="color: FireBrick "> Usuarios-Administrar </h3>
				
				</div>
				<div class="col-md-1" >
											
			
					<!--<div id="logo"><a href="index.php"><img    align="right" src="images/reforestacion.png" width='60%'></img></a></div>-->
				</div>
			</div>


<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'users-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'username',
		'password',
		'grupo',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
