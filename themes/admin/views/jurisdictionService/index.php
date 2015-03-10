<?php
/* @var $this JurisdictionServiceController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Jurisdiction Services',
);

$this->menu=array(
	array('label'=>'Create JurisdictionService','url'=>array('create')),
	array('label'=>'Manage JurisdictionService','url'=>array('admin')),
);
?>

<h1>Jurisdiction Services</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>