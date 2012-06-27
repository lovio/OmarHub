<?php
$this->breadcrumbs=array(
	'Needs'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List need', 'url'=>array('index')),
	array('label'=>'Create need', 'url'=>array('create')),
	array('label'=>'Update need', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete need', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage need', 'url'=>array('admin')),
);
?>

<h1>View need #<?php echo $model->id; ?></h1>

<?php $this->renderPartial('_view', array(
	'data'=>$model,
)); ?>

<div id="comments">
	<?php if($model->commentCount>=1): ?>
        <h3> 
            <?php echo $model->commentCount>1 ? $model->commentCount . 'comments' : 'One comment'; ?> 
        </h3>
 


		<?php $this->renderPartial('_commentofneed',array(
			'need'=>$model,
			'comments'=>$model->comments,
		)); ?>
	<?php endif; ?>

	<h3>Leave a Comment</h3>

	<?php if(Yii::app()->user->hasFlash('commentSubmitted')): ?>
		<div class="flash-success">
			<?php echo Yii::app()->user->getFlash('commentSubmitted'); ?>
		</div>
		<?php endif; ?>

		<?php $this->renderPartial('/commentofneed/_form',array(
			'model'=>$comment,
		)); ?>


</div><!-- comments -->
