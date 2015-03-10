<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'title',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'alias',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textAreaRow($model,'introtext',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'fulltext',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'state',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'catid',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'created',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'created_by',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'modified',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'modified_by',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'publish_up',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'publish_down',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ordering',array('class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'metakey',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'metadesc',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'hits',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'featured',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
