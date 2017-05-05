<?php
/* @var $this VideoController */
/* @var $data Video */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('url_preview')); ?>:</b>
	<?php echo CHtml::encode($data->url_preview); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('url_video')); ?>:</b>
	<?php echo CHtml::encode($data->url_video); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('iframe')); ?>:</b>
	<?php echo CHtml::encode($data->iframe); ?>
	<br />


</div>