<?php
/* @var $this EdirectoryController */
/* @var $model Edirectory */
$this->pageTitle = $model->title . ' - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Directories' => array('index'),
    $model->title,
);
?>
<article class="post">
    <div class="panel panel-default">
        <div class="panel-body">
            <h3 class="post-title"><?php echo CHtml::decode($model->title); ?></h3>
            <p>
                <?php
                $this->widget('application.extensions.SocialShareButton.SocialShareButton', array(
                    'style' => 'horizontal',
                    'networks' => array('facebook', 'googleplus', 'linkedin', 'twitter'),
                    'data_via' => '', //twitter username (for twitter only, if exists else leave empty)
                ));
                ?>
            </p>
            <div class="row">
                <div class="col-lg-12">
                    <?php
                    $this->widget('zii.widgets.CDetailView', array(
                        'data' => $model,
                        'attributes' => array(
                            array(
                                'name' => 'category',
                                'type' => 'raw',
                                'value' => DirectoryCategory::getDirectoryCategory($model->category),
                            ),
                            'title',
                            'address',
                            'telephone',
                            'mobile',
                            'email',
                            'fax',
                            'website',
                            'postcode',
                            array(
                                'name' => 'country',
                                'type' => 'raw',
                                'value' => Country::getCountry($model->country),
                            ),
                            array(
                                'name' => 'state',
                                'type' => 'raw',
                                'value' => State::getState($model->state),
                            ),
                            array(
                                'name' => 'city',
                                'type' => 'raw',
                                'value' => City::getCity($model->city),
                            ),
                            array(
                                'name' => 'district',
                                'type' => 'raw',
                                'value' => District::getDistrict($model->district),
                            ),
                            array(
                                'name' => 'thana',
                                'type' => 'raw',
                                'value' => Thana::getThana($model->thana),
                            ),
                            array(
                                'name' => 'details',
                                'type' => 'raw',
                                'value' => $model->details,
                            ),
                            array(
                                'name' => 'created_on',
                                'type' => 'raw',
                                'value' => date("F j, Y, g:i A", strtotime($model->created_on)),
                            ),
                            'hits',
                        ),
                    ));
                    ?>
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <div class="row">
                <div class="col-lg-10 col-md-9 col-sm-8">
                    <i class="fa fa-clock-o"></i> Created: <?php echo UserAdmin::get_date($model->created_on); ?>, <i class="fa fa-folder-o"></i> Category: <?php echo DirectoryCategory::getDirectoryCategory($model->category); ?>, 
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4">                    
                </div>
            </div>
        </div>
    </div>
</article> <!-- post -->