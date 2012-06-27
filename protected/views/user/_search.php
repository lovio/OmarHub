<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pic'); ?>
		<?php echo $form->textField($model,'pic'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'firstlogin'); ?>
		<?php echo $form->textField($model,'firstlogin'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'role'); ?>
		<?php echo $form->textField($model,'role'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'firstname'); ?>
		<?php echo $form->textField($model,'firstname',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lastname'); ?>
		<?php echo $form->textField($model,'lastname',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'gender'); ?>
		<?php echo $form->textField($model,'gender',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'languages'); ?>
		<?php echo $form->textField($model,'languages',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fieldsofwork'); ?>
		<?php echo $form->textField($model,'fieldsofwork',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'locationsofwork'); ?>
		<?php echo $form->textField($model,'locationsofwork',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'targetpopulations'); ?>
		<?php echo $form->textField($model,'targetpopulations',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mobilenumbercountrycode'); ?>
		<?php echo $form->textField($model,'mobilenumbercountrycode'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mobilenumber'); ?>
		<?php echo $form->textField($model,'mobilenumber'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mailingaddress'); ?>
		<?php echo $form->textField($model,'mailingaddress',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'street'); ?>
		<?php echo $form->textField($model,'street',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'city'); ?>
		<?php echo $form->textField($model,'city',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'state'); ?>
		<?php echo $form->textField($model,'state',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'zippostalcode'); ?>
		<?php echo $form->textField($model,'zippostalcode'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'skypeid'); ?>
		<?php echo $form->textField($model,'skypeid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'organizationid'); ?>
		<?php echo $form->textField($model,'organizationid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'followers'); ?>
		<?php echo $form->textField($model,'followers'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->