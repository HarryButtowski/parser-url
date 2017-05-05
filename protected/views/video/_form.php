<?php
/* @var $this VideoController */
/* @var $model Video */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'video-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'url_preview'); ?>
		<?php echo $form->textField($model,'url_preview',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'url_preview'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'url_video'); ?>
		<?php echo $form->textField($model,'url_video',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'url_video'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'iframe'); ?>
		<?php echo $form->textArea($model,'iframe',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'iframe'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->