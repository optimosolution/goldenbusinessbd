<?php
/* @var $this JurisdictionLocationController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Jurisdiction Locations',
);

$this->menu=array(
	array('label'=>'Create JurisdictionLocation','url'=>array('create')),
	array('label'=>'Manage JurisdictionLocation','url'=>array('admin')),
);
?>

<h1>Jurisdiction Locations</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>