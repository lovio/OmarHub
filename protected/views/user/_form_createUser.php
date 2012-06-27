<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>


	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'firstname'); ?>
		<?php echo $form->textField($model,'firstname',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'firstname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lastname'); ?>
		<?php echo $form->textField($model,'lastname',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'lastname'); ?>
	</div>

<!--  	<div class="row">
		<?php echo $form->labelEx($model,'pic'); ?>
		<?php echo $form->fileField($model,'pic'); ?>
		<?php echo $form->error($model,'pic'); ?>
	</div> -->


	<div class="row">
		<?php echo $form->labelEx($model,'role'); ?>
		<?php echo $form->radioButtonList($model,'role',$model->getRoleOptions()); ?>
		<?php echo $form->error($model,'role'); ?>
	</div>
<!-- 	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div> -->

<!-- 	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div> -->



<!-- 	<div class="row">
		<?php echo $form->labelEx($model,'firstlogin'); ?>
		<?php echo $form->textField($model,'firstlogin'); ?>
		<?php echo $form->error($model,'firstlogin'); ?>
	</div> -->





<!-- 	<div class="row">
		<?php echo $form->labelEx($model,'gender'); ?>
		<?php echo $form->textField($model,'gender',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'gender'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'languages'); ?>
		<?php echo $form->textField($model,'languages',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'languages'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fieldsofwork'); ?>
		<?php echo $form->textField($model,'fieldsofwork',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'fieldsofwork'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'locationsofwork'); ?>
		<?php echo $form->textField($model,'locationsofwork',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'locationsofwork'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'targetpopulations'); ?>
		<?php echo $form->textField($model,'targetpopulations',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'targetpopulations'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mobilenumbercountrycode'); ?>
		<?php echo $form->textField($model,'mobilenumbercountrycode'); ?>
		<?php echo $form->error($model,'mobilenumbercountrycode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mobilenumber'); ?>
		<?php echo $form->textField($model,'mobilenumber'); ?>
		<?php echo $form->error($model,'mobilenumber'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mailingaddress'); ?>
		<?php echo $form->textField($model,'mailingaddress',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'mailingaddress'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'street'); ?>
		<?php echo $form->textField($model,'street',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'street'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'city'); ?>
		<?php echo $form->textField($model,'city',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'city'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'state'); ?>
		<?php echo $form->textField($model,'state',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'state'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'zippostalcode'); ?>
		<?php echo $form->textField($model,'zippostalcode'); ?>
		<?php echo $form->error($model,'zippostalcode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'skypeid'); ?>
		<?php echo $form->textField($model,'skypeid'); ?>
		<?php echo $form->error($model,'skypeid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'organizationid'); ?>
		<?php echo $form->textField($model,'organizationid'); ?>
		<?php echo $form->error($model,'organizationid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'followers'); ?>
		<?php echo $form->textField($model,'followers'); ?>
		<?php echo $form->error($model,'followers'); ?>
	</div> -->

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->