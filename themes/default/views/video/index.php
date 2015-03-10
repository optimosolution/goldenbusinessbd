<?php
/* @var $this VideoController */
/* @var $dataProvider CActiveDataProvider */

$this->pageTitle = 'Video Gallery - ' . Yii::app()->name;
?>
<div class="row">
    <div class="col-md-12">
        <div class="pricign-box pricign-box-pro animated fadeInUp animation-delay-9">
            <div class="pricing-box-header">
                <h2>Video Gallery</h2>
                <p>Golden business video gallery</p>
            </div>
            <div class="pricing-box-content">
                <?php
                $this->widget('zii.widgets.CListView', array(
					'pager' => array(
                'htmlOptions' => array(
                    'class' => 'pagination',
                ),
                'header' => '',
                'selectedPageCssClass' => 'active',
            ),
            'pagerCssClass' => 'dt-row dt-bottom-row',
                    'dataProvider' => $dataProvider,
                    'itemView' => '_view',
                ));
                ?>
                <div class="clearfix"></div>
            </div>
        </div>
    </div> <!-- col-md-8 --> 
</div>
