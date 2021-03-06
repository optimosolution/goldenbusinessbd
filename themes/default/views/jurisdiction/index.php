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
    //Company
    $('#JurisdictionCompany_company_type').chained('#JurisdictionCompany_district');
    $('#JurisdictionCompany_letter_specific_name').chained('#JurisdictionCompany_company_type');
    //Other
    $('#JurisdictionOther_profession_type').chained('#JurisdictionOther_district');
    $('#JurisdictionOther_letter_specific_name').chained('#JurisdictionOther_profession_type');
    //Business
    //$('#JurisdictionBusiness_district').chained('#JurisdictionBusiness_btype');
    $('#JurisdictionBusiness_business_type').chained('#JurisdictionBusiness_district, #JurisdictionBusiness_btype');
    $('#JurisdictionBusiness_letter_specific_name').chained('#JurisdictionBusiness_business_type');   
");
Yii::app()->clientScript->registerScript('search', "
$('.jurisdiction-service-form form').submit(function(){
	$('#jurisdiction-service-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
$('.jurisdiction-profession-form form').submit(function(){
	$('#jurisdiction-profession-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
$('.jurisdiction-business-form form').submit(function(){
	$('#jurisdiction-business-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
$('.jurisdiction-company-form form').submit(function(){
	$('#jurisdiction-company-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
$('.jurisdiction-other-form form').submit(function(){
	$('#jurisdiction-other-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="row">
    <div class="col-xs-12">
        <h2 class="section-title">Jurisdiction Finder, Please select your desire category</h2>
    </div>
    <div class="col-md-12">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab1" data-toggle="tab">Service</a></li>
            <li><a href="#tab2" data-toggle="tab">Profession</a></li>
            <li><a href="#tab3" data-toggle="tab">Business (Individual/Firm)</a></li>
            <li><a href="#tab4" data-toggle="tab">Business (Ltd. Company)</a></li>
            <li><a href="#tab5" data-toggle="tab">Others</a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane active" id="tab1">
                <div class="jurisdiction-service-form" >
                    <?php
                    $this->renderPartial('_search', array(
                        'model' => $model,
                    ));
                    ?>
                </div>
                <?php
                $this->widget('zii.widgets.grid.CGridView', array(
                    'id' => 'jurisdiction-service-grid',
                    'dataProvider' => $model->search(),
                    //'filter' => $model,
                    'htmlOptions' => array('class' => ''),
                    'itemsCssClass' => 'table table-striped',
                    'template' => '{items}{summary}{pager}',
                    'pager' => array(
                        'htmlOptions' => array(
                            'class' => 'pagination',
                        ),
                        'header' => '',
                        'selectedPageCssClass' => 'active',
                    ),
                    'pagerCssClass' => 'widget-footer',
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
                <div class="jurisdiction-profession-form" >
                    <?php
                    $this->renderPartial('_search_profession', array(
                        'model_profession' => $model_profession,
                    ));
                    ?>
                </div>
                <?php
                $this->widget('zii.widgets.grid.CGridView', array(
                    'id' => 'jurisdiction-profession-grid',
                    'dataProvider' => $model_profession->search(),
                    //'filter' => $model,
                    'htmlOptions' => array('class' => ''),
                    'itemsCssClass' => 'table table-striped',
                    'template' => '{items}{summary}{pager}',
                    'pager' => array(
                        'htmlOptions' => array(
                            'class' => 'pagination',
                        ),
                        'header' => '',
                        'selectedPageCssClass' => 'active',
                    ),
                    'pagerCssClass' => 'widget-footer',
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
                <div class="jurisdiction-business-form" >
                    <?php
                    $this->renderPartial('_search_business', array(
                        'model_business' => $model_business,
                    ));
                    ?>
                </div>
                <?php
                $this->widget('zii.widgets.grid.CGridView', array(
                    'id' => 'jurisdiction-business-grid',
                    'dataProvider' => $model_business->search(),
                    //'filter' => $model_company,
                    'htmlOptions' => array('class' => ''),
                    'itemsCssClass' => 'table table-striped',
                    'template' => '{items}{summary}{pager}',
                    'pager' => array(
                        'htmlOptions' => array(
                            'class' => 'pagination',
                        ),
                        'header' => '',
                        'selectedPageCssClass' => 'active',
                    ),
                    'pagerCssClass' => 'widget-footer',
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
            <div class="tab-pane" id="tab4">
                <div class="jurisdiction-company-form" >
                    <?php
                    $this->renderPartial('_search_company', array(
                        'model_company' => $model_company,
                    ));
                    ?>
                </div>
                <?php
                $this->widget('zii.widgets.grid.CGridView', array(
                    'id' => 'jurisdiction-company-grid',
                    'dataProvider' => $model_company->search(),
                    //'filter' => $model_company,
                    'htmlOptions' => array('class' => ''),
                    'itemsCssClass' => 'table table-striped',
                    'template' => '{items}{summary}{pager}',
                    'pager' => array(
                        'htmlOptions' => array(
                            'class' => 'pagination',
                        ),
                        'header' => '',
                        'selectedPageCssClass' => 'active',
                    ),
                    'pagerCssClass' => 'widget-footer',
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
                <div class="jurisdiction-other-form" >
                    <?php
                    $this->renderPartial('_search_other', array(
                        'model_other' => $model_other,
                    ));
                    ?>
                </div>
                <?php
                $this->widget('zii.widgets.grid.CGridView', array(
                    'id' => 'jurisdiction-other-grid',
                    'dataProvider' => $model_other->search(),
                    //'filter' => $model_company,
                    'htmlOptions' => array('class' => ''),
                    'itemsCssClass' => 'table table-striped',
                    'template' => '{items}{summary}{pager}',
                    'pager' => array(
                        'htmlOptions' => array(
                            'class' => 'pagination',
                        ),
                        'header' => '',
                        'selectedPageCssClass' => 'active',
                    ),
                    'pagerCssClass' => 'widget-footer',
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
        </div>
    </div>
</div>