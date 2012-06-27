<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'offer-form',
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
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>1000)); ?>
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
		<?php echo $form->labelEx($model,'ownerid'); ?>
		<?php echo $form->textField($model,'ownerid'); ?>
		<?php echo $form->error($model,'ownerid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'updatetime'); ?>
		<?php echo $form->textField($model,'updatetime'); ?>
		<?php echo $form->error($model,'updatetime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'commenttime'); ?>
		<?php echo $form->textField($model,'commenttime'); ?>
		<?php echo $form->error($model,'commenttime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'followers'); ?>
		<?php echo $form->textField($model,'followers'); ?>
		<?php echo $form->error($model,'followers'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->