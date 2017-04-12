<?php
/* @var $this ExamCategoryController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Exam Categories',
);

$this->menu=array(
	array('label'=>'Create ExamCategory','url'=>array('create')),
	array('label'=>'Manage ExamCategory','url'=>array('admin')),
);
?>

<h1>Exam Categories</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>