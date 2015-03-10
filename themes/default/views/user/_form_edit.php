<div class="form">
    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'user-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
        'htmlOptions' => array('enctype' => 'multipart/form-data')
    ));
    ?>
    <p class="help-block">Fields with <span class="required">*</span> are required.</p>
    <?php echo $form->errorSummary($model); ?>
    <?php echo $form->passwordFieldControlGroup($model, 'password', array('span' => 5, 'maxlength' => 100)); ?>    
    <div class="form-actions">
        <?php
        echo TbHtml::submitButton('Change password', array(
            'color' => TbHtml::BUTTON_COLOR_PRIMARY,
            'size' => TbHtml::BUTTON_SIZE_DEFAULT,
        ));
        ?>
    </div>
    <?php $this->endWidget(); ?>
</div><!-- form -->