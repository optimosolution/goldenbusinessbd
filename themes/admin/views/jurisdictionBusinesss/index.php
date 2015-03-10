<?php
/* @var $this JurisdictionBusinesssController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Jurisdiction Businessses',
);

$this->menu=array(
	array('label'=>'Create JurisdictionBusinesss','url'=>array('create')),
	array('label'=>'Manage JurisdictionBusinesss','url'=>array('admin')),
);
?>

<h1>Jurisdiction Businessses</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>