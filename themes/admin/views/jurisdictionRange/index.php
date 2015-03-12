<?php
/* @var $this JurisdictionRangeController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Jurisdiction Ranges',
);

$this->menu=array(
	array('label'=>'Create JurisdictionRange','url'=>array('create')),
	array('label'=>'Manage JurisdictionRange','url'=>array('admin')),
);
?>

<h1>Jurisdiction Ranges</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>