<?php
$this->pageTitle = 'Set user access - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Set user access',
);
Yii::app()->clientScript->registerScript('Check', "
$(function() {
        $('.checkall_1').on('click', function() {
            $(this).closest('fieldset').find(':checkbox').prop('checked', this.checked);
        });
    });
");
$getGroup = $_GET['id'];
?>  
<div class="widget-box">
    <div class="widget-header">
        <h5><?php echo UserGroup::get_user_group($_GET['id']); ?></h5>
        <div class="widget-toolbar">
            <a data-action="settings" href="#"><i class="icon-cog"></i></a>
            <a data-action="reload" href="#"><i class="icon-refresh"></i></a>
            <a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a>
            <a data-action="close" href="#"><i class="icon-remove"></i></a>
        </div>
    </div><!--/.widget-header -->
    <div class="widget-body">
        <div class="widget-main">
            <?php
            $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                'id' => 'acl-forms',
                'enableAjaxValidation' => false,
            ));
            ?>
            <div class="form-actions">
                <?php echo TbHtml::submitButton('Update Access', array('color' => TbHtml::BUTTON_COLOR_PRIMARY, 'size' => TbHtml::BUTTON_SIZE_DEFAULT, 'name' => 'updateaccess')); ?>
            </div>
            <?php
            $acl_controller = Yii::app()->db->createCommand()
                    ->select('*')
                    ->from('{{acl_controller}}')
                    ->order('controller ASC')
                    ->queryAll();
            echo '<div class="well">';
            echo'<fieldset>';
            echo'<div class="alert alert-error"><input type="checkbox" class="checkall_1"> Check All / None</div>';
            foreach ($acl_controller as $key => $values) {
                print '<div style="font-size:18px;">' . $values["controller"] . '</div>';
                print '<div style="padding-bottom:20px;">';
                $acl = Yii::app()->db->createCommand()
                        ->select('*')
                        ->from('{{acl}}')
                        ->where('group_id=' . $getGroup . ' AND controller="' . $values["controller"] . '"')
                        ->order('controller, actions ASC')
                        ->queryAll();
                foreach ($acl as $keys => $valuess) {
                    if ($valuess["access"] == 1) {
                        print '<span style="padding:0px 10px 0px 10px;"><input type="checkbox" checked="checked" name="' . $valuess["controller"] . '||' . $valuess["actions"] . '" value="1">&nbsp;' . $valuess["action_title"] . '</span>';
                    } else {
                        print '<span style="padding:0px 10px 0px 10px;"><input type="checkbox" name="' . $valuess["controller"] . '||' . $valuess["actions"] . '" value="1">&nbsp;' . $valuess["action_title"] . '</span>';
                    }
                }
                print '</div>';
            }
            echo'</fieldset>';
            echo '</div>';
            print '<input type="hidden" name="usergroup" value="' . $getGroup . '">';
            ?>
            <div class="form-actions">
                <?php echo TbHtml::submitButton('Update Access', array('color' => TbHtml::BUTTON_COLOR_PRIMARY, 'size' => TbHtml::BUTTON_SIZE_DEFAULT, 'name' => 'updateaccess')); ?>
            </div>
            <?php $this->endWidget(); ?>
        </div>
    </div><!--/.widget-body -->
</div><!--/.widget-box -->
