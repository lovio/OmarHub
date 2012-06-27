<div class="view">
	<?php 
		if($data->type==1)echo '<img alt="need" class="activityIcon" src='.Yii::app()->request->baseUrl.'/images/need.gif />';
		if($data->type==2)echo '<img alt="need" class="activityIcon" src='.Yii::app()->request->baseUrl.'/images/offer.gif />';
		if($data->type==3)echo '<img alt="need" class="activityIcon" src='.Yii::app()->request->baseUrl.'/images/event.gif />';
		echo "<br>";
	?>
	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->title), array('activity/view', 'id'=>$data->id)); ?>
	<br />
	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo $data->description;?>
	<br />
	<b><?php echo CHtml::encode($data->getAttributeLabel('deadtime')); ?>:</b>
	<?php echo $data->updatetime;?>
	<br />
	
</div>