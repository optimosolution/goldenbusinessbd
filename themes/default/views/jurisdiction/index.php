<?php
/* @var $this JurisdictionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Jurisdiction',
);
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile(Yii::app()->theme->baseUrl . '/js/jquery.chained.js', CClientScript::POS_END);
Yii::app()->clientScript->registerScript('chain-select', " 
//Service
$('#JurisdictionService_employer_type').chained('#JurisdictionService_district');
$('#JurisdictionService_letter_specific_name').chained('#JurisdictionService_employer_type');
//Profession
$('#JurisdictionProfession_profession_type').chained('#JurisdictionProfession_district');
$('#JurisdictionProfession_letter_specific_name').chained('#JurisdictionProfession_profession_type');
");
?>

<div class="row">
    <div class="col-xs-12">
        <h2 class="section-title">Jurisdiction Finder</h2>
    </div>
    <div class="col-md-12">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab1" data-toggle="tab">Service</a></li>
            <li><a href="#tab2" data-toggle="tab">Profession</a></li>
            <li><a href="#tab3" data-toggle="tab">Business (Individual/Firm)</a></li>
            <li><a href="#ta4" data-toggle="tab">Business (Ltd. Company)</a></li>
            <li><a href="#ta5" data-toggle="tab">Others</a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane active" id="tab1">
                <?php
                $this->renderPartial('_search', array(
                    'model' => $model,
                ));
                $this->widget('zii.widgets.grid.CGridView', array(
                    'id' => 'jurisdiction-service-grid',
                    'dataProvider' => $model->search(),
                    //'filter' => $model,
                    'columns' => array(
                        array(
                            'name' => 'zone',
                            'type' => 'raw',
                            'value' => 'JurisdictionZone::get_title($data->zone)',
                            'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Zone'),
                        ),
                        array(
                            'name' => 'range',
                            'type' => 'raw',
                            'value' => 'JurisdictionRange::get_title($data->range)',
                            'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Ranges'),
                        ),
                        array(
                            'name' => 'circle',
                            'type' => 'raw',
                            'value' => '$data->circle0->tax_taxes_circle',
                            'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Circle'),
                        ),
                        array(
                            'header' => 'Address',
                            'type' => 'raw',
                            'value' => 'JurisdictionCircle::get_address($data->circle)',
                            'htmlOptions' => array('style' => "text-align:left;width:300px;", 'title' => 'Address'),
                        ),
                    ),
                ));
                ?>
                <div class="clearfix"></div>
            </div>
            <div class="tab-pane" id="tab2">
                <?php
                $this->renderPartial('_search_profession', array(
                    'model_profession' => $model_profession,
                ));
                $this->widget('zii.widgets.grid.CGridView', array(
                    'id' => 'jurisdiction-profession-grid',
                    'dataProvider' => $model_profession->search(),
                    //'filter' => $model,
                    'columns' => array(
                        array(
                            'name' => 'zone',
                            'type' => 'raw',
                            'value' => 'JurisdictionZone::get_title($data->zone)',
                            'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Zone'),
                        ),
                        array(
                            'name' => 'range',
                            'type' => 'raw',
                            'value' => 'JurisdictionRange::get_title($data->range)',
                            'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Ranges'),
                        ),
                        array(
                            'name' => 'circle',
                            'type' => 'raw',
                            'value' => '$data->circle0->tax_taxes_circle',
                            'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Circle'),
                        ),
                        array(
                            'header' => 'Address',
                            'type' => 'raw',
                            'value' => 'JurisdictionCircle::get_address($data->circle)',
                            'htmlOptions' => array('style' => "text-align:left;width:300px;", 'title' => 'Address'),
                        ),
                    ),
                ));
                ?>
                <div class="clearfix"></div>
            </div>
            <div class="tab-pane" id="tab3">

                <div class="clearfix"></div>
            </div>
            <div class="tab-pane" id="tab4">
                <?php
                $this->renderPartial('_search_company', array(
                    'model_company' => $model_company,
                ));
                $this->widget('zii.widgets.grid.CGridView', array(
                    'id' => 'jurisdiction-company-grid',
                    'dataProvider' => $model_company->search(),
                    //'filter' => $model_company,
                    'columns' => array(
                        array(
                            'name' => 'zone',
                            'type' => 'raw',
                            'value' => 'JurisdictionZone::get_title($data->zone)',
                            'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Zone'),
                        ),
                        array(
                            'name' => 'range',
                            'type' => 'raw',
                            'value' => 'JurisdictionRange::get_title($data->range)',
                            'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Ranges'),
                        ),
                        array(
                            'name' => 'circle',
                            'type' => 'raw',
                            'value' => '$data->circle0->tax_taxes_circle',
                            'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Circle'),
                        ),
                        array(
                            'header' => 'Address',
                            'type' => 'raw',
                            'value' => 'JurisdictionCircle::get_address($data->circle)',
                            'htmlOptions' => array('style' => "text-align:left;width:300px;", 'title' => 'Address'),
                        ),
                    ),
                ));
                ?>
                <div class="clearfix"></div>
            </div>
            <div class="tab-pane" id="tab5">

                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>