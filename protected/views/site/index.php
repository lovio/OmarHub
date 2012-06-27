<?php $this->pageTitle=Yii::app()->name;
Yii::app()->clientScript->registerScript('', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('user-grid', {
		data: $(this).serialize()
	});
	return false;
});
");

?>

<div class="left-content">
	<div >
		<dl class="userWrap">
			<dt class="avatar">
				<img src="<?php echo Yii::app()->request->baseUrl?>/uploads/<?php  echo $user->pic; ?>" alt="avatar"/>
			</dt>
			<dd class="userInfo">
				<p><?php echo $user->username ?></p>
				<p><?php echo $user->email ?></p>
				<p><?php echo $user->gender ?></p>				
			</dd>
			<a class="edit" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=user/edit">Edit</a>
			<div class="clear"></div>
		</dl>
	</div>
	<div class="mainContentWrap">
			<div id="mainmenu">
				<?php $this->widget('zii.widgets.CMenu',array(
					'items'=>array(
						array('label'=>'All', 'url'=>array('/')),
						array('label'=>'offers','url'=>array('/')),
						array('label'=>'needs','url'=>array('/')),
						array('label'=>'events','url'=>array('/')),
					),
				)); ?>
			</div><!-- mainmenu -->
			<div class="allNews">
			<?php $this->widget('zii.widgets.CListView', array(
				'dataProvider'=>$dataProvider,
				'itemView'=>'_view',
			)); ?>


			</div>
			
	</div>

</div>
<div class="right-content">
	<div class="follow">
		<h2>Follower(<?php echo $user->we_followerscount;?>)</h2>
		<?php
			$i=0; 
			foreach ($we_followers as $we_follower) 
			{ 
				if($i<2)
				{	?>
					<li><?php echo CHtml::link($we_follower->user->username,array('user/view','id'=>$we_follower->userid)); ?></li> 
				<?php
					$i++;
				}
				else
					break;
			}
			?>
			<?php
			  $this->renderPartial('_showall',array(
			  		'models'=>$we_followers,
			  		'type'=>4,
			  ))
			;?> 
		<?php 
			// if($followerArr)
			// {
			// 	foreach ($followerArr as $key => $value) {
			// 		echo '<img class="avatar" src="'.Yii::app()->request->baseUrl.'/uploads/'.$value->pic.'" alt="avatar"/>';	
			// 	    echo CHtml::link(CHtml::encode($value->username), array('/user/view', 'id'=>$value->id));
			// 	}
			// }
			// else echo "no follower"
		?>
	</div>
	<div class="beFollowed">
		<h2>Following</h2>
		<div class="followuser">
			<li><h3>followuser</h3></li>
			<?php
			$i=0; 
			foreach ($we_followings as $we_following) 
			{ 
				if($i<2)
				{	?>
					<li><?php echo CHtml::link($we_following->follower->username,array('user/view','id'=>$we_following->userid)); ?></li> 
				<?php
					$i++;
				}
				else
					break;
			}
			?>
			<?php
			  $this->renderPartial('_showall2',array(
			  		'models'=>$we_followings,
			  		'type'=>4,
			  ))
			;?> 
		</div>

		<div class="followactivity">
			<li><h3>followactivity</h3></li>
			<?php
			//find latest followneed
				$i=0; 
				foreach ($we_followingneeds as $we_followingneed) 
				{ 
					$need=Activity::model()->findByPk($we_followingneed->followerid);
					if($i<1)
					{	?>
						<li>needs:<?php echo CHtml::link($need->title,array('activity/view','id'=>$we_followingneed->followerid)); ?></li> 
					<?php
						$i++;
					}
					else
						break;
				}
			?>

			<?php
			//find latest followoffer
				$i=0; 
				foreach ($we_followingoffers as $we_followingoffer) 
				{ 
					$offer=Activity::model()->findByPk($we_followingoffer->followerid);
					if($i<1)
					{	?>
						<li>offers:<?php echo CHtml::link($offer->title,array('activity/view','id'=>$we_followingoffer->followerid)); ?></li> 
					<?php
						$i++;
					}
					else
						break;
				}
			?>

			<?php
			//find latest followevent
				$i=0; 
				foreach ($we_followingevents as $we_followingevent) 
				{ 
					$event=Activity::model()->findByPk($we_followingevent->followerid);
					if($i<1)
					{	?>
						<li>events:<?php echo CHtml::link($event->title,array('activity/view','id'=>$we_followingevent->followerid)); ?></li> 
					<?php
						$i++;
					}
					else
						break;
				}
			?>

			<?php
			//show all need/offer/event you followed
			   $this->renderPartial('_showall3',array(
			   		'needmodels'=>$we_followingneeds,
			   		'offermodels'=>$we_followingoffers,
			   		'eventmodels'=>$we_followingevents,
			   ))
			;?> 
		</div>
	</div>
</div>
