<?php
/* @var $this JurisdictionCircleController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Jurisdiction Circles',
);

$this->menu=array(
	array('label'=>'Create JurisdictionCircle','url'=>array('create')),
	array('label'=>'Manage JurisdictionCircle','url'=>array('admin')),
);
?>

<h1>Jurisdiction Circles</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>