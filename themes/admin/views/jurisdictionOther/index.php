<?php
/* @var $this JurisdictionOtherController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Jurisdiction Others',
);

$this->menu=array(
	array('label'=>'Create JurisdictionOther','url'=>array('create')),
	array('label'=>'Manage JurisdictionOther','url'=>array('admin')),
);
?>

<h1>Jurisdiction Others</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>