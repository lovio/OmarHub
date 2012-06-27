<div class="view view_activity">
	<dl class="clear">
		<dt class="left_dt">
			<?php 
				$u=User::model()->findByPk($data->ownerid);
				$pic = $u->pic;
				echo '<img class="avatar" src="'.Yii::app()->request->baseUrl.'/uploads/'.$pic.'" alt="avatar"/>';
				echo '<p>'.CHtml::link(CHtml::encode($u->username), array('/user/view', 'id'=>$u->id)).'</p>';
			?>

			<?php 
				if($data->type==1)echo '<img alt="need" class="activityIcon" src='.Yii::app()->request->baseUrl.'/images/need.gif />';
				if($data->type==2)echo '<img alt="need" class="activityIcon" src='.Yii::app()->request->baseUrl.'/images/offer.gif />';
				if($data->type==3)echo '<img alt="need" class="activityIcon" src='.Yii::app()->request->baseUrl.'/images/event.gif />';
				//echo "<br>";
			?>
		</dt>
		<dd class="right_dd">

			<p><b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
				<?php echo CHtml::link(CHtml::encode($data->title), array('view', 'id'=>$data->id)); ?>
			</p>
			<p>
			<b><?php echo CHtml::encode($data->getAttributeLabel('DESC')); ?>:</b>
			<?php echo CHtml::encode($data->description); ?>
			</p>
			<p>
			<?php 
				if($data->filedsofwork)
				{
					echo '<p><b>Fields:</b>'.CHtml::encode($data->filedsofwork).'</p>';
				}
	
			?>
			<?php 
				if($data->locationsofwork)
				{	
					echo '<p><b>locations:</b>'.CHtml::encode($data->locationsofwork).'</p>';
				}
			?>
			<?php 
				if($data->filedsofwork)
				{
					echo '<p><b>Target:</b>'.CHtml::encode($data->targetpopulations).'</p>';
				}
	
			?>
			<?php 
				if($data->filedsofwork)
				{
					echo '<p><b>Start Date:</b>'.CHtml::encode($data->startdate).'</p>';
				}
	
			?>

	<br />
		</dd>
		<dd class="right">
			<p><?php if($data->isFollowed($data->id,$data->type)) 
					echo CHtml::link('UnFollow',array('user/Unfollow','id'=>$data->id,'type'=>$data->type));
		  		else
					echo CHtml::link('Follow',array('user/Follow','id'=>$data->id,'type'=>$data->type));
			?>
			</p>
		</dd>
	</dl>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('followers')); ?>:</b>
	<?php echo CHtml::encode($data->followers); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('publish')); ?>:</b>
	<?php echo CHtml::encode($data->publish); ?>
	<br />

	*/ ?>

</div>