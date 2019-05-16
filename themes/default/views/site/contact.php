<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form TbActiveForm */

$this->pageTitle = Yii::app()->name . ' - Contact Us';
$this->breadcrumbs = array(
    'Contact',
);
?>
<?php if (Yii::app()->user->hasFlash('contact')): ?>
    <?php
    $this->widget('bootstrap.widgets.TbAlert', array(
        'alerts' => array('contact'),
    ));
    ?>
<?php else: ?>
    <div class="row">
        <div class="col-md-8">
            <section>
                <h2 class="section-title">Send Message</h2>
                <p> If you have business inquiries or other questions, please fill out the following form to contact us. Thank you. </p>                
                <?php
                $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                    'id' => 'contact-form',
                    'enableClientValidation' => true,
                    'clientOptions' => array(
                        'validateOnSubmit' => true,
                    ),
                ));
                ?>
                <p><?php echo $form->errorSummary($model); ?></p>
                <div class="form-group">
                    <label for="InputName">Name</label>
                    <?php echo $form->textField($model, 'name', array('class' => 'form-control', 'placeholder' => 'Enter name')); ?>
                </div>
                <div class="form-group">
                    <label for="InputEmail1">Email address</label>
                    <?php echo $form->textField($model, 'email', array('class' => 'form-control', 'placeholder' => 'Enter email')); ?>
                </div>
                <div class="form-group">
                    <label for="InputSubject">Subject</label>
                    <?php echo $form->textField($model, 'subject', array('class' => 'form-control', 'placeholder' => 'Enter subject')); ?>
                </div>
                <div class="form-group">
                    <label for="InputMessage">Mesagge</label>
                    <?php echo $form->textArea($model, 'body', array('rows' => 3, 'class' => 'form-control', 'placeholder' => 'Enter message')); ?>
                </div>
                <div class="form-group capcha">
                    <?php if (CCaptcha::checkRequirements()): ?>
                        <div class="row">
                            <?php //echo $form->labelEx($model, 'verifyCode'); ?>
                            <div>
                                <?php $this->widget('CCaptcha'); ?>
                                <?php echo $form->textField($model, 'verifyCode'); ?>
                            </div>
                            <div class="hint">Please enter the letters as they are shown in the image above. Letters are not case-sensitive.</div>
                            <?php echo $form->error($model, 'verifyCode'); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <?php echo CHtml::submitButton('Send request', array('class' => 'btn btn-primary pull-right')); ?>
                <div class="clearfix"></div>
                <?php $this->endWidget(); ?>
            </section>
        </div>
        <div class="col-md-4">
            <section>
                <div class="panel panel-primary">
                    <div class="panel-heading"><i class="fa fa-envelope-o"></i> Additional Information</div>
                    <div class="panel-body">
                        <h4 class="section-title">Contacts</h4>
                        <address>
                            <strong>Golden Bangladesh</strong><br>
                            House#07 (Ground Floor)<br>
                            Road-2/B, Sector-04, Uttara<br>
                            Dhaka, 1230<br>
                            <abbr title="Cell">M:</abbr> +880 1911485949<br />
                            <abbr title="Office">O:</abbr> +880 1970079001-6 <br />
                            Mail: <a href="mailto:goldenassociates@gmail.com">goldenassociates@gmail.com</a>
                        </address> 
                        <!-- Business Hours -->
                        <h4 class="section-title">Business Hours</h4>
                        <ul class="list-unstyled">
                            <li><strong>Saturday-Thursday:</strong> 9am to 7pm</li>
                            <li><strong>Friday:</strong> Closed</li>
                        </ul>
                    </div>
                </div>
                <div class="block">
                    <iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2FGoldenBangladesh&amp;width=360&amp;height=290&amp;colorscheme=light&amp;show_faces=true&amp;header=true&amp;stream=false&amp;show_border=true&amp;appId=409526085754514" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:360px; height:290px;" allowTransparency="true"></iframe>
                </div>
            </section>
        </div>
    </div>
<?php endif; ?>