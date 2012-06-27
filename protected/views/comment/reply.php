<?php
$this->breadcrumbs=array(
	'Reply',
);

?>

<h1>Reply Commentofneed said by <?php echo CHtml::link($comment->author->username,array('user/view','id'=>$comment->authorid)); ?></h1>
<h2> <?php echo $comment->content; ?></h2>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>