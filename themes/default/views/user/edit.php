<?php
$this->pageTitle = 'Change password- ' . Yii::app()->name;
$this->breadcrumbs = array(
    $model->name => array('view', 'id' => $model->id),
    'Change password',
);
?>
<fieldset>
    <legend>Change password</legend>
    <?php $this->renderPartial('_form_edit', array('model' => $model,)); ?>
</fieldset>