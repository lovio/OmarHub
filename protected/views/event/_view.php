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

	<b><?php echo CHtml::encode($data->getAttributeLabel('filedsofwork')); ?>:</b>
	<?php echo CHtml::encode($data->filedsofwork); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('locationsofwork')); ?>:</b>
	<?php echo CHtml::encode($data->locationsofwork); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('targetpopulations')); ?>:</b>
	<?php echo CHtml::encode($data->targetpopulations); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('startdate')); ?>:</b>
	<?php echo CHtml::encode($data->startdate); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('onedayevent')); ?>:</b>
	<?php echo CHtml::encode($data->onedayevent); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('enddate')); ?>:</b>
	<?php echo CHtml::encode($data->enddate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ownerid')); ?>:</b>
	<?php echo CHtml::encode($data->ownerid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updatetime')); ?>:</b>
	<?php echo CHtml::encode($data->updatetime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('commenttime')); ?>:</b>
	<?php echo CHtml::encode($data->commenttime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('followers')); ?>:</b>
	<?php echo CHtml::encode($data->followers); ?>
	<br />

	*/ ?>

</div>