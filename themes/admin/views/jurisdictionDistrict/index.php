<?php
/* @var $this JurisdictionDistrictController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Jurisdiction Districts',
);

$this->menu=array(
	array('label'=>'Create JurisdictionDistrict','url'=>array('create')),
	array('label'=>'Manage JurisdictionDistrict','url'=>array('admin')),
);
?>

<h1>Jurisdiction Districts</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>