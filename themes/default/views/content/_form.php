<?php
/* @var $this ContentController */
/* @var $model Content */
/* @var $form CActiveForm */
?>

<div class="form">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'content-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array('enctype' => 'multipart/form-data')
    ));
    ?>
    <p class="note">Fields with <span class="required">*</span> are required.</p>
    <?php echo $form->errorSummary($model); ?>
    <div class="row-fluid">
        <div class="span12">
            <?php echo $form->labelEx($model, 'catid'); ?>
            <?php
            if ($model->isNewRecord) {
                echo ContentCategory::get_category_new('Content', 'catid');
            } else {
                echo ContentCategory::get_category_update('Content', 'catid', $model->catid);
            }
            ?>
        </div>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'title'); ?>
        <?php echo $form->textField($model, 'title', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
        <?php echo $form->error($model, 'title'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'introtext'); ?>
        <?php
        $this->widget('application.extensions.yii-ckeditor.CKEditorWidget', array(
            'model' => $model,
            'attribute' => 'introtext',
            // editor options http://docs.ckeditor.com/#!/api/CKEDITOR.config
            'config' => array(
                'language' => 'en',
            //'toolbar' => 'Basic',
            ),
        ));
        ?>
    </div>
    <div class="row" style="margin: 5px 0px;">
        <?php echo $form->labelEx($model, 'profile_picture'); ?>
        <?php echo $form->fileField($model, 'profile_picture', array('size' => 36, 'maxlength' => 255, 'class' => 'span12')); ?>
    </div>
    <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)); ?>
        <?php echo TbHtml::resetButton('Reset', array('color' => TbHtml::BUTTON_COLOR_INFO)); ?>
    </div>
    <?php $this->endWidget(); ?>
</div><!-- form -->