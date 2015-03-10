<?php
/* @var $this EdirectoryController */
/* @var $model Edirectory */
/* @var $form CActiveForm */
?>

<div class="wide form">
    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
    ));
    $cs = Yii::app()->getClientScript();
    $cs->registerScriptFile(Yii::app()->theme->baseUrl . '/assets/js/jquery.chained.js', CClientScript::POS_END);
    Yii::app()->clientScript->registerScript('chain-select', " 
    $('#Edirectory_state').chained('#Edirectory_country');
    $('#Edirectory_city').chained('#Edirectory_state');
    $('#Edirectory_district').chained('#Edirectory_city');
    $('#Edirectory_thana').chained('#Edirectory_district');
    ");
    ?>
    <div class="row-fluid">
        <div class="span12">
            <?php
            echo DirectoryCategory::get_category_new('Edirectory', 'category');
            ?>
        </div>
    </div>
    <?php echo $form->textFieldControlGroup($model, 'title', array('span' => 5, 'maxlength' => 255)); ?>
    <?php echo $form->textFieldControlGroup($model, 'address', array('span' => 5, 'maxlength' => 255)); ?>
    <?php echo $form->textFieldControlGroup($model, 'telephone', array('span' => 5, 'maxlength' => 255)); ?>
    <?php echo $form->textFieldControlGroup($model, 'mobile', array('span' => 5, 'maxlength' => 100)); ?>
    <?php echo $form->textFieldControlGroup($model, 'email', array('span' => 5, 'maxlength' => 255)); ?>
    <?php echo $form->textFieldControlGroup($model, 'fax', array('span' => 5, 'maxlength' => 255)); ?>
    <?php echo $form->textFieldControlGroup($model, 'website', array('span' => 5, 'maxlength' => 255)); ?>
    <?php echo $form->textFieldControlGroup($model, 'postcode', array('span' => 5, 'maxlength' => 50)); ?>
    <?php echo $form->dropDownListControlGroup($model, 'country', CHtml::listData(Country::model()->findAll(array('condition' => 'published=1', "order" => "country_name")), 'id', 'country_name'), array('empty' => '--please select--', 'class' => 'span5')); ?>
    <div class="row-fluid">
        <div class="span5">
            <?php echo $form->labelEx($model, 'state'); ?>
            <?php echo State::get_sate_list('Edirectory', 'state', $model->state); ?>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span5">
            <?php echo $form->labelEx($model, 'city'); ?>
            <?php echo City::get_city_list('Edirectory', 'city', $model->city); ?>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span5">
            <?php echo $form->labelEx($model, 'district'); ?>
            <?php echo District::get_district_list('Edirectory', 'district', $model->district); ?>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span5">
            <?php echo $form->labelEx($model, 'thana'); ?>
            <?php echo Thana::get_thana_list('Edirectory', 'thana', $model->thana); ?>
        </div>
    </div>
    <?php echo $form->dropDownListControlGroup($model, 'published', array('1' => 'Yes', '0' => 'No')); ?>

    <div class="form-actions">
        <?php echo TbHtml::submitButton('Search', array('color' => TbHtml::BUTTON_COLOR_PRIMARY,)); ?>
    </div>

    <?php $this->endWidget(); ?>
</div><!-- search-form -->