<?php
$this->pageTitle = 'User details - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Users' => array('admin'),
    $model->name,
);
?>
<div class="widget-box">
    <div class="widget-header">
        <h5>Details User (<?php echo $model->name; ?>)</h5>
        <div class="widget-toolbar">            
            <a data-action="settings" href="#"><i class="icon-cog"></i></a>
            <a data-action="reload" href="#"><i class="icon-refresh"></i></a>
            <a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a>
            <a data-action="close" href="#"><i class="icon-remove"></i></a>
        </div>
        <div class="widget-toolbar">            
            <?php echo CHtml::link('<i class="icon-lock"></i>', array('edit', 'id' => $model->id), array('data-rel' => 'tooltip', 'title' => 'Change Password', 'data-placement' => 'bottom')); ?>
        </div>
        <div class="widget-toolbar">
            <?php echo CHtml::link('<i class="icon-pencil"></i>', array('update', 'id' => $model->id), array('data-rel' => 'tooltip', 'title' => 'Edit', 'data-placement' => 'bottom')); ?>
        </div>
        <div class="widget-toolbar">
            <?php echo CHtml::link('<i class="icon-plus"></i>', array('create'), array('data-rel' => 'tooltip', 'title' => 'Add', 'data-placement' => 'bottom')); ?>            
        </div>
    </div><!--/.widget-header -->
    <div class="widget-body">
        <div class="widget-main">
            <div class="widget-box">
                <div class="user-profile row-fluid">
                    <div class="tabbable">
                        <ul class="nav nav-tabs padding-18">
                            <li class="active">
                                <a data-toggle="tab" href="#home">
                                    <i class="green icon-user bigger-120"></i>
                                    Profile
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#AuditTrail">
                                    <i class="orange icon-rss bigger-120"></i>
                                    Audit Trail
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#PageviewStatistics">
                                    <i class="orange icon-signal bigger-120"></i>
                                    Pageview Statistics
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content no-border padding-24">
                            <div id="home" class="tab-pane in active">
                                <div class="row-fluid">
                                    <div class="span3 center">
                                        <span class="profile-picture">
                                            <?php
                                            $filePath = Yii::app()->basePath . '/../uploads/profile_picture/' . $model_profile->profile_picture;
                                            if ((is_file($filePath)) && (file_exists($filePath))) {
                                                echo CHtml::image(Yii::app()->baseUrl . '/uploads/profile_picture/' . $model_profile->profile_picture, 'Profile Picture', array('alt' => $model->name, 'class' => 'span12 thumbnail', 'title' => $model->name, 'style' => ''));
                                            } else {
                                                echo CHtml::image(Yii::app()->baseUrl . '/uploads/profile_picture/profile.jpg', 'Profile Picture', array('alt' => $model->name, 'class' => 'span12 thumbnail', 'title' => $model->name, 'style' => ''));
                                            }
                                            ?>
                                        </span>
                                        <div class="space space-4"></div>
                                        <?php echo CHtml::link('<i class="icon-edit bigger-110"></i> Edit Profile', array('update', 'id' => $model->id), array('class' => 'btn btn-small btn-block btn-primary')); ?>
                                        <?php echo CHtml::link('<i class="icon-lock bigger-110"></i> Change Password', array('edit', 'id' => $model->id), array('class' => 'btn btn-small btn-block btn-warning')); ?>
                                    </div><!-- /span -->
                                    <div class="span9">
                                        <h4 class="blue">
                                            <span class="middle"><?php echo $model->name; ?></span>
                                            <?php echo '<span style="margin-left:20px;"></span>' . OnlineUser::get_online_status($model->id); ?>
                                        </h4>
                                        <div class="profile-user-info">
                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> Username </div>

                                                <div class="profile-info-value">
                                                    <span><?php echo $model->username; ?></span>
                                                </div>
                                            </div>                                        
                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> Email </div>
                                                <div class="profile-info-value">
                                                    <span><?php echo $model->email; ?></span>
                                                </div>
                                            </div>
                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> Group </div>
                                                <div class="profile-info-value">
                                                    <span><?php echo $model->getGroupName($model->group_id); ?></span>
                                                </div>
                                            </div>
                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> Joined </div>

                                                <div class="profile-info-value">
                                                    <span><?php echo UserAdmin::get_date_time($model->registerDate); ?></span>
                                                </div>
                                            </div>
                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> Last Online </div>

                                                <div class="profile-info-value">
                                                    <span><?php echo UserAdmin::get_date_time($model->lastvisitDate); ?></span>
                                                </div>
                                            </div>
                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> Country </div>

                                                <div class="profile-info-value">
                                                    <span><?php echo Country::getCountry($model_profile->country_id); ?></span>
                                                </div>
                                            </div>
                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> State </div>

                                                <div class="profile-info-value">
                                                    <span><?php echo State::getState($model_profile->state_id); ?></span>
                                                </div>
                                            </div>
                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> City </div>

                                                <div class="profile-info-value">
                                                    <span><?php echo City::getCity($model_profile->city_id); ?></span>
                                                </div>
                                            </div>
                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> Address </div>

                                                <div class="profile-info-value">
                                                    <span><?php echo $model_profile->address; ?></span>
                                                </div>
                                            </div>
                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> Mobile </div>

                                                <div class="profile-info-value">
                                                    <span><?php echo $model_profile->mobile; ?></span>
                                                </div>
                                            </div>
                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> Phone </div>

                                                <div class="profile-info-value">
                                                    <span><?php echo $model_profile->phone; ?></span>
                                                </div>
                                            </div>
                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> Fax </div>

                                                <div class="profile-info-value">
                                                    <span><?php echo $model_profile->fax; ?></span>
                                                </div>
                                            </div>
                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> Expiry </div>

                                                <div class="profile-info-value">
                                                    <span><?php echo UserAdmin::get_date_time($model_profile->expiry); ?></span>
                                                </div>
                                            </div>
                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> Birth Date </div>

                                                <div class="profile-info-value">
                                                    <span><?php echo UserAdmin::get_date_time($model_profile->birth_date); ?></span>
                                                </div>
                                            </div>
                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> Status </div>
                                                <div class="profile-info-value">
                                                    <span><?php echo $model->UserStatus->status; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="hr hr-8 dotted"></div>
                                        <div class="profile-user-info">
                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> Website </div>
                                                <div class="profile-info-value">
                                                    <?php echo $model_profile->website; ?>
                                                </div>
                                            </div>
                                            <div class="profile-info-row">
                                                <div class="profile-info-name">
                                                    <i class="middle icon-facebook-sign bigger-150 blue"></i>
                                                </div>
                                                <div class="profile-info-value">
                                                    <a href="#">Find me on Facebook</a>
                                                </div>
                                            </div>
                                            <div class="profile-info-row">
                                                <div class="profile-info-name">
                                                    <i class="middle icon-twitter-sign bigger-150 light-blue"></i>
                                                </div>
                                                <div class="profile-info-value">
                                                    <a href="#">Follow me on Twitter</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- /span -->
                                </div><!-- /row-fluid -->
                            </div><!-- #home -->
                            <div id="AuditTrail" class="tab-pane">
                                <div class="row-fluid">
                                    <div class="span12">
                                        <?php
                                        $this->widget('bootstrap.widgets.TbGridView', array(
                                            'id' => 'audit-trail-grid',
                                            'dataProvider' => $model_AuditTrail->search_user_only($model->id, 0),
                                            'filter' => $model_AuditTrail,
                                            'columns' => array(
                                                array(
                                                    'name' => 'login_time',
                                                    'type' => 'raw',
                                                    'value' => 'AuditTrail::get_date_time($data->login_time)',
                                                    'htmlOptions' => array('style' => "text-align:left;width:250px;", 'title' => 'Login time'),
                                                ),
                                                array(
                                                    'name' => 'logout_time',
                                                    'type' => 'raw',
                                                    'value' => 'AuditTrail::get_date_time($data->logout_time)',
                                                    'htmlOptions' => array('style' => "text-align:left;width:250px;", 'title' => 'Logout time'),
                                                ),
                                                array(
                                                    'header' => 'Duration',
                                                    'type' => 'raw',
                                                    'value' => 'AuditTrail::returnInterval($data->login_time,$data->logout_time)',
                                                ),
                                                array(
                                                    'header' => 'Actions',
                                                    'template' => '{delete}',
                                                    'class' => 'bootstrap.widgets.TbButtonColumn',
                                                    'htmlOptions' => array('style' => "text-align:center;width:80px;", 'title' => 'Actions',),
                                                ),
                                            ),
                                        ));
                                        ?> 
                                    </div><!-- /span -->
                                </div><!-- /row -->
                            </div><!-- /#AuditTrail -->
                            <div id="PageviewStatistics" class="tab-pane">
                                <div class="row-fluid">
                                    <div class="span12">
                                        <?php
                                        $this->widget('bootstrap.widgets.TbGridView', array(
                                            'id' => 'visitor-grid',
                                            'dataProvider' => $model_Visitor->search_user_only($model->id, 0),
                                            'filter' => $model_Visitor,
                                            'columns' => array(
                                                'page_title',
                                                'page_link',
                                                array(
                                                    'name' => 'server_time',
                                                    'value' => 'AuditTrail::get_date_time($data->server_time)',
                                                    'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', array('model' => $model_Visitor, 'attribute' => 'server_time', 'htmlOptions' => array('id' => 'datepicker2', 'size' => '10',), 'i18nScriptFile' => 'jquery.ui.datepicker-en.js', 'defaultOptions' => array('showOn' => 'focus', 'dateFormat' => 'yy-mm-dd', 'showOtherMonths' => true, 'selectOtherMonths' => true, 'changeMonth' => true, 'changeYear' => true, 'showButtonPanel' => false,)), true),
                                                    'htmlOptions' => array('style' => "text-align:center;"),
                                                ),
                                                'browser',
                                                'visitor_ip',
                                                array(
                                                    'header' => 'Actions',
                                                    'template' => '{delete}',
                                                    'class' => 'bootstrap.widgets.TbButtonColumn',
                                                ),
                                            ),
                                        ));
                                        ?>
                                    </div><!-- /span -->
                                </div><!-- /row -->
                            </div><!-- /#PageviewStatistics -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/.widget-body -->
</div><!--/.widget-box -->