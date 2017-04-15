<?php
/* @var $this ExamController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Course List',
);
?>

<h1>Course List</h1>

<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_course',
));
?>
