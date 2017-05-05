<?php
/* @var $this VideoController */
/* @var $model Video */
/* @var $form CActiveForm */

$this->breadcrumbs = [
    'Videos' => ['index'],
    'Create',
];

$this->menu = [
    ['label' => 'List Video', 'url' => ['index']],
    ['label' => 'Manage Video', 'url' => ['admin']],
];
?>

<h1>Create Video</h1>

<div class="form">

    <?php $form = $this->beginWidget('CActiveForm', [
        'id'                   => 'video-form',
        'enableAjaxValidation' => false,
    ]); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'url_video'); ?>
        <?php echo $form->textField($model, 'url_video', ['size' => 60, 'maxlength' => 255]); ?>
        <?php echo $form->error($model, 'url_video'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'iframe'); ?>
        <?php echo $form->textArea($model, 'iframe', ['rows' => 6, 'cols' => 50]); ?>
        <?php echo $form->error($model, 'iframe'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Create'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div>