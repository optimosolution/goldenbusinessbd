<?php
/* @var $this JurisdictionCompanyTypeController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Jurisdiction Company Types',
);

$this->menu=array(
	array('label'=>'Create JurisdictionCompanyType','url'=>array('create')),
	array('label'=>'Manage JurisdictionCompanyType','url'=>array('admin')),
);
?>

<h1>Jurisdiction Company Types</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>