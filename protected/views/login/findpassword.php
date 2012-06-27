<?php
$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'findpassword',
);
?>

<h1>Find password</h1>


<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'findpassword-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton('Find'); ?>
	</div>


<?php $this->endWidget(); ?>
</div><!-- form -->
