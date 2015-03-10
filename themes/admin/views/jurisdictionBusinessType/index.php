<?php
/* @var $this JurisdictionBusinessTypeController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Jurisdiction Business Types',
);

$this->menu=array(
	array('label'=>'Create JurisdictionBusinessType','url'=>array('create')),
	array('label'=>'Manage JurisdictionBusinessType','url'=>array('admin')),
);
?>

<h1>Jurisdiction Business Types</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>