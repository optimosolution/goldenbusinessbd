<?php
/* @var $this JurisdictionProfessionController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Jurisdiction Professions',
);

$this->menu=array(
	array('label'=>'Create JurisdictionProfession','url'=>array('create')),
	array('label'=>'Manage JurisdictionProfession','url'=>array('admin')),
);
?>

<h1>Jurisdiction Professions</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>