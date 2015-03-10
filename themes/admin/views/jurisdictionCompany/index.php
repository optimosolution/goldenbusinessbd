<?php
/* @var $this JurisdictionCompanyController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Jurisdiction Companies',
);

$this->menu=array(
	array('label'=>'Create JurisdictionCompany','url'=>array('create')),
	array('label'=>'Manage JurisdictionCompany','url'=>array('admin')),
);
?>

<h1>Jurisdiction Companies</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>