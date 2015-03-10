<?php
/* @var $this JurisdictionEmployerController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Jurisdiction Employers',
);

$this->menu=array(
	array('label'=>'Create JurisdictionEmployer','url'=>array('create')),
	array('label'=>'Manage JurisdictionEmployer','url'=>array('admin')),
);
?>

<h1>Jurisdiction Employers</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>