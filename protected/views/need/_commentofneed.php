<?php foreach($comments as $comment): ?>
<div class="comment" id="c<?php echo $comment->id; ?>">



	<div class="author">
		<?php echo $comment->author->username; ?> says <br />
		to <?php echo $comment->publisher->username; ?>
		<div class="edit">

		</div>
	</div>

	<div class="time">
		 on [ <?php echo $comment->updatetime; ?>> ] <br />
		<?php echo CHtml::link('Update',array('commentofneed/update','id'=>$comment->id)); ?> |
		<?php echo CHtml::linkButton('Delete', array(
			'submit'=>array('commentofneed/delete','id'=>$comment->id),
			'confirm'=>"Are you sure to delete comment #{$comment->id}?",
		)); ?> |
		<?php echo CHtml::link('Reply',array('commentofneed/reply','id'=>$comment->id)); ?> |

	</div>

	<div class="activity">
		in activity [ <?php echo $comment->need->title; ?> ] <br />
	</div>
	<div class="content">
		<b><?php echo nl2br(CHtml::encode($comment->content)); ?></b>
	</div>

</div><!-- comment -->
<?php endforeach; ?>