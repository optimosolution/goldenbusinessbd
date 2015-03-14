<?php
/* @var $this JurisdictionEmployerTypeController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Jurisdiction Employer Types',
);

$this->menu=array(
	array('label'=>'Create JurisdictionEmployerType','url'=>array('create')),
	array('label'=>'Manage JurisdictionEmployerType','url'=>array('admin')),
);
?>

<h1>Jurisdiction Employer Types</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>