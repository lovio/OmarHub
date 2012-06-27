<?php foreach($comments as $comment): ?>
<div class="comment" id="c<?php echo $comment->id; ?>">



	<div class="author">
		<?php echo CHtml::link($comment->author->username,array('user/view','id'=>$comment->authorid)); ?> says <br />
		to <?php echo CHtml::link($comment->publisher->username,array('user/view','id'=>$comment->publisherid)); ?>
		<div class="edit">

		</div>
	</div>

	<div class="time">
		 on [ <?php echo $comment->updatetime; ?>] <br />
		 <div class="commentmenu">
		 <?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Update', 'url'=>array('comment/update','id'=>$comment->id),'visible'=>$comment->isAuthor($comment->authorid)),
				array('label'=>'Delete', 'url'=>array('comment/drop','id'=>$comment->id),'visible'=>$comment->isAuthor($comment->authorid)),
				array('label'=>'Reply', 'url'=>array('comment/reply','id'=>$comment->id)),
		)))
		 ?>
		</div>
	</div>
	<div class="activity">
		in activity [ <?php echo CHtml::link($comment->activity->title,array('activity/view','id'=>$comment->activityid)); ?> ] <br />
	</div>
	<div class="content">
		<b><?php echo nl2br(CHtml::encode($comment->content)); ?></b> <br /><br />
	</div>

</div><!-- comment -->
<?php endforeach; ?>