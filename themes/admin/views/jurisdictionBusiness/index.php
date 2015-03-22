<?php
/* @var $this JurisdictionBusinessController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Jurisdiction Businesses',
);

$this->menu=array(
	array('label'=>'Create JurisdictionBusiness','url'=>array('create')),
	array('label'=>'Manage JurisdictionBusiness','url'=>array('admin')),
);
?>

<h1>Jurisdiction Businesses</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>