<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::encode($data->username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pic')); ?>:</b>
	<?php echo CHtml::encode($data->pic); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('firstlogin')); ?>:</b>
	<?php echo CHtml::encode($data->firstlogin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('role')); ?>:</b>
	<?php echo CHtml::encode($data->role); ?>
	<br />
	<?php if(Yii::app()->user->id!==$data->id) 
			{
				if($data->isFollowed($data->id,4)) 
					echo CHtml::link('UnFollow',array('user/Unfollow','id'=>$data->id,'type'=>4));
		  		else
					echo CHtml::link('Follow',array('user/Follow','id'=>$data->id,'type'=>4));
			}	
	?>
	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('firstname')); ?>:</b>
	<?php echo CHtml::encode($data->firstname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lastname')); ?>:</b>
	<?php echo CHtml::encode($data->lastname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gender')); ?>:</b>
	<?php echo CHtml::encode($data->gender); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('languages')); ?>:</b>
	<?php echo CHtml::encode($data->languages); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fieldsofwork')); ?>:</b>
	<?php echo CHtml::encode($data->fieldsofwork); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('locationsofwork')); ?>:</b>
	<?php echo CHtml::encode($data->locationsofwork); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('targetpopulations')); ?>:</b>
	<?php echo CHtml::encode($data->targetpopulations); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mobilenumbercountrycode')); ?>:</b>
	<?php echo CHtml::encode($data->mobilenumbercountrycode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mobilenumber')); ?>:</b>
	<?php echo CHtml::encode($data->mobilenumber); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mailingaddress')); ?>:</b>
	<?php echo CHtml::encode($data->mailingaddress); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('street')); ?>:</b>
	<?php echo CHtml::encode($data->street); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('city')); ?>:</b>
	<?php echo CHtml::encode($data->city); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('state')); ?>:</b>
	<?php echo CHtml::encode($data->state); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('zippostalcode')); ?>:</b>
	<?php echo CHtml::encode($data->zippostalcode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('skypeid')); ?>:</b>
	<?php echo CHtml::encode($data->skypeid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('organizationid')); ?>:</b>
	<?php echo CHtml::encode($data->organizationid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('followers')); ?>:</b>
	<?php echo CHtml::encode($data->followers); ?>
	<br />

	*/ ?>

</div>