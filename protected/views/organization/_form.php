<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'organization-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'acronym'); ?>
		<?php echo $form->textField($model,'acronym',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'acronym'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'formeddate'); ?>
		<?php echo $form->textField($model,'formeddate'); ?>
		<?php echo $form->error($model,'formeddate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'website'); ?>
		<?php echo $form->textField($model,'website',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'website'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->textField($model,'type'); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'employeesnumber'); ?>
		<?php echo $form->textField($model,'employeesnumber'); ?>
		<?php echo $form->error($model,'employeesnumber'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'budget'); ?>
		<?php echo $form->textField($model,'budget',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'budget'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phonecode'); ?>
		<?php echo $form->textField($model,'phonecode'); ?>
		<?php echo $form->error($model,'phonecode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'puonenumber'); ?>
		<?php echo $form->textField($model,'puonenumber'); ?>
		<?php echo $form->error($model,'puonenumber'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->