<?php
/* @var $this JurisdictionZoneController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Jurisdiction Zones',
);

$this->menu=array(
	array('label'=>'Create JurisdictionZone','url'=>array('create')),
	array('label'=>'Manage JurisdictionZone','url'=>array('admin')),
);
?>

<h1>Jurisdiction Zones</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>