<?php
/* @var $this SroController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Sros',
);

$this->menu=array(
	array('label'=>'Create Sro','url'=>array('create')),
	array('label'=>'Manage Sro','url'=>array('admin')),
);
?>

<h1>Sros</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>