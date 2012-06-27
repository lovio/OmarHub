<?php
$this->breadcrumbs=array(
	'Commentofneeds'=>array('index'),
	'Reply',
);

$this->menu=array(
	array('label'=>'List Commentofneed', 'url'=>array('index')),
	array('label'=>'Create Commentofneed', 'url'=>array('create')),
	array('label'=>'View Commentofneed', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Commentofneed', 'url'=>array('admin')),
);
?>

<h1>Reply Commentofneed said by <?php echo $comment->author->username; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>