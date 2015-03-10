<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'user-admin-form',
    'enableAjaxValidation' => false,
    'htmlOptions' => array('enctype' => 'multipart/form-data')
        ));
?>
<div class="widget-box">
    <div class="widget-title">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#tab1">Basic</a></li>
            <li><a data-toggle="tab" href="#tab2">Profile</a></li>
        </ul>
    </div>
    <div class="widget-content tab-content">
        <div id="tab1" class="tab-pane active">
            <p class="help-block">Fields with <span class="required">*</span> are required.</p>
            <?php echo $form->errorSummary($model); ?>
            <?php echo $form->textFieldControlGroup($model, 'name', array('class' => 'span5', 'maxlength' => 255)); ?>
            <?php echo $form->textFieldControlGroup($model, 'username', array('class' => 'span5', 'maxlength' => 150)); ?>
            <?php echo $form->textFieldControlGroup($model, 'email', array('class' => 'span5', 'maxlength' => 100)); ?>            
            <?php echo $form->dropDownListControlGroup($model, 'group_id', CHtml::listData(UserGroup::model()->findAll(array("order" => "id")), 'id', 'title'), array('empty' => '--please select--', 'class' => 'span5')); ?>
            <?php echo $form->dropDownListControlGroup($model, 'status', CHtml::listData(UserStatus::model()->findAll(array("order" => "status")), 'id', 'status'), array('empty' => '--please select--', 'class' => 'span5')); ?>
        </div>        
        <div id="tab2" class="tab-pane">          
            <?php echo $form->dropDownListControlGroup($model_profile, 'country_id', CHtml::listData(Country::model()->findAll(array('condition' => 'published=1', "order" => "country_name")), 'id', 'country_name'), array('empty' => '--please select--', 'class' => 'span5', 'options' => array('18' => array('selected' => true)))); ?>
            <?php echo $form->dropDownListControlGroup($model_profile, 'state_id', CHtml::listData(State::model()->findAll(array('condition' => 'published=1', "order" => "state_name")), 'id', 'state_name'), array('empty' => '--please select--', 'class' => 'span5', 'options' => array())); ?>
            <?php echo $form->dropDownListControlGroup($model_profile, 'city_id', CHtml::listData(City::model()->findAll(array('condition' => 'published=1', "order" => "city_name")), 'id', 'city_name'), array('empty' => '--please select--', 'class' => 'span5', 'options' => array())); ?>
            <?php echo $form->textFieldControlGroup($model_profile, 'address', array('class' => 'span5', 'maxlength' => 255)); ?>
            <?php echo $form->textFieldControlGroup($model_profile, 'mobile', array('class' => 'span5', 'maxlength' => 100)); ?>
            <?php echo $form->textFieldControlGroup($model_profile, 'phone', array('class' => 'span5', 'maxlength' => 100)); ?>
            <?php echo $form->textFieldControlGroup($model_profile, 'fax', array('class' => 'span5', 'maxlength' => 100)); ?>
            <?php echo $form->textFieldControlGroup($model_profile, 'website', array('class' => 'span5', 'maxlength' => 150)); ?>
            <?php echo $form->labelEx($model_profile, 'expiry'); ?>
            <?php
            echo $form->widget('zii.widgets.jui.CJuiDatePicker', array(
                'language' => 'en',
                'model' => $model_profile, // Model object
                'attribute' => 'expiry',
                'options' => array(
                    'mode' => 'date',
                    'changeYear' => true,
                    'changeMonth' => true,
                    'yearRange' => '1900:2200',
                    'dateFormat' => 'yy-mm-dd',
                    'timeFormat' => '',
                    'showTimepicker' => false,
                ),
                'htmlOptions' => array(
                    'placeholder' => 'Expiry',
                    'style' => 'width:460px !important;',
                    'class' => 'span5',
                ),
                    ), true);
            ?>
            <?php echo $form->labelEx($model_profile, 'birth_date'); ?>
            <?php
            echo $form->widget('zii.widgets.jui.CJuiDatePicker', array(
                'language' => 'en',
                'model' => $model_profile, // Model object
                'attribute' => 'birth_date',
                'options' => array(
                    'mode' => 'date',
                    'changeYear' => true,
                    'changeMonth' => true,
                    'yearRange' => '1900:2015',
                    'dateFormat' => 'yy-mm-dd',
                    'timeFormat' => '',
                    'showTimepicker' => false,
                ),
                'htmlOptions' => array(
                    'placeholder' => 'Date of Birth',
                    'style' => 'width:460px !important;',
                    'class' => 'span5',
                ),
                    ), true);
            ?>
            <div class="row-fluid">
                <div class="span5">
                    <?php echo $form->fileFieldControlGroup($model_profile, 'profile_picture', array('maxlength' => 255, 'class' => 'span12')); ?>
                </div>
            </div>   
        </div>
    </div>
</div>
<div class="form-actions">
    <?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)); ?>
    <?php echo TbHtml::resetButton('Reset', array('color' => TbHtml::BUTTON_COLOR_INFO)); ?>
</div>
<?php $this->endWidget(); ?>
