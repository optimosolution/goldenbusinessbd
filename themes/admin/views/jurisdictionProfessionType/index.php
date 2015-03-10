<?php
/* @var $this JurisdictionProfessionTypeController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Jurisdiction Profession Types',
);

$this->menu=array(
	array('label'=>'Create JurisdictionProfessionType','url'=>array('create')),
	array('label'=>'Manage JurisdictionProfessionType','url'=>array('admin')),
);
?>

<h1>Jurisdiction Profession Types</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>