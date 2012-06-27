<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'activity-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('cols'=>53,'rows'=>10)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'filedsofwork'); ?>
		<?php echo $form->textField($model,'filedsofwork',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'filedsofwork'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'locationsofwork'); ?>
		<?php echo $form->textField($model,'locationsofwork',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'locationsofwork'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'targetpopulations'); ?>
		<?php echo $form->textField($model,'targetpopulations',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'targetpopulations'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'freetag'); ?>
		<?php echo $form->textField($model,'freetag',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'freetag'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'startdate'); ?>
		<?php echo $form->textField($model,'startdate'); ?>
		<?php echo $form->error($model,'startdate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'onedayevent'); ?>
		<?php echo $form->textField($model,'onedayevent'); ?>
		<?php echo $form->error($model,'onedayevent'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'enddate'); ?>
		<?php echo $form->textField($model,'enddate'); ?>
		<?php echo $form->error($model,'enddate'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->