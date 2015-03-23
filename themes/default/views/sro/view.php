<?php
/* @var $this SroController */
/* @var $model Sro */
$this->pageTitle = $model->sro_no . ' - ' . Yii::app()->name;
$this->breadcrumbs = array(
    $model->sroType->title => array('index', 'id' => $model->sro_type),
    $model->sro_no,
);
?>
<h3><?php echo $model->sro_no; ?></h3>
<p><strong>SL: </strong><?php echo $model->sl_no; ?></p>
<p><strong>SRO No.: </strong><?php echo $model->sro_no; ?></p>
<p><strong>Date: </strong><?php echo UserAdmin::get_date($model->sro_date); ?></p>
<p><strong>Summary</strong><br /><?php echo $model->summary; ?></p>
<p><strong>Description</strong><br /><?php echo $model->description; ?></p>
<p><strong>Note: </strong><br /><?php echo $model->note; ?></p>
<p><?php echo CHtml::link('Download', array('sro/download', 'id' => $model->id)); ?></p>