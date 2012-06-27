<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('testId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->testId), array('view', 'id'=>$data->testId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('userID')); ?>:</b>
	<?php echo CHtml::encode($data->userID); ?>
	<br />


</div>