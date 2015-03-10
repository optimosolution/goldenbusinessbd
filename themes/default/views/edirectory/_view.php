<?php
/* @var $this EdirectoryController */
/* @var $data Edirectory */
?>
<article class="post">
    <div class="panel panel-default">
        <div class="panel-body">
            <h3 class="post-title"><?php echo CHtml::decode($data->title); ?></h3>
            <div class="row">
                <div class="col-lg-12">
                    <b><?php echo CHtml::encode($data->getAttributeLabel('address')); ?>:</b>
                    <?php echo CHtml::encode($data->address); ?>
                    <br />

                    <b><?php echo CHtml::encode($data->getAttributeLabel('telephone')); ?>:</b>
                    <?php echo CHtml::encode($data->telephone); ?>
                    <br />

                    <b><?php echo CHtml::encode($data->getAttributeLabel('mobile')); ?>:</b>
                    <?php echo CHtml::encode($data->mobile); ?>
                    <br />

                    <b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
                    <?php echo CHtml::encode($data->email); ?>
                    <br />
                    <b><?php echo CHtml::encode($data->getAttributeLabel('fax')); ?>:</b>
                    <?php echo CHtml::encode($data->fax); ?>
                    <br />

                    <b><?php echo CHtml::encode($data->getAttributeLabel('website')); ?>:</b>
                    <?php echo CHtml::encode($data->website); ?>
                    <br />

                    <b><?php echo CHtml::encode($data->getAttributeLabel('postcode')); ?>:</b>
                    <?php echo CHtml::encode($data->postcode); ?>
                    <br />

                    <b><?php echo CHtml::encode($data->getAttributeLabel('country')); ?>:</b>
                    <?php echo Country::getCountry(CHtml::encode($data->country)); ?>
                    <br />

                    <b><?php echo CHtml::encode($data->getAttributeLabel('state')); ?>:</b>
                    <?php echo State::getState(CHtml::encode($data->state)); ?>
                    <br />

                    <b><?php echo CHtml::encode($data->getAttributeLabel('city')); ?>:</b>
                    <?php echo City::getCity(CHtml::encode($data->city)); ?>
                    <br />

                    <b><?php echo CHtml::encode($data->getAttributeLabel('district')); ?>:</b>
                    <?php echo District::getDistrict(CHtml::encode($data->district)); ?>
                    <br />

                    <b><?php echo CHtml::encode($data->getAttributeLabel('thana')); ?>:</b>
                    <?php echo Thana::getThana(CHtml::encode($data->thana)); ?>
                    <br />

                    <b><?php echo CHtml::encode($data->getAttributeLabel('details')); ?>:</b>
                    <?php echo CHtml::encode($data->details); ?>
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <div class="row">
                <div class="col-lg-10 col-md-9 col-sm-8">
                    <i class="fa fa-clock-o"></i> Created: <?php echo UserAdmin::get_date($data->created_on); ?>, <i class="fa fa-folder-o"></i> Category: <?php echo DirectoryCategory::getDirectoryCategory($data->category); ?>, 
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4">                    
                </div>
            </div>
        </div>
    </div>
</article> <!-- post -->