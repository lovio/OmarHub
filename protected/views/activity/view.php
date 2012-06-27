<?php
$this->breadcrumbs=array(
	'Activities'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Activity', 'url'=>array('index')),
	array('label'=>'Create Activity', 'url'=>array('create')),
	array('label'=>'Update Activity', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Activity', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Activity', 'url'=>array('admin')),
);
?>

<h1>View Activity #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'description',
		'filedsofwork',
		'locationsofwork',
		'targetpopulations',
		'freetag',
		'startdate',
		'onedayevent',
		'enddate',
		'ownerid',
		'updatetime',
		'followers',
		'type',
		'publish',
	),
)); ?>

<?php
	$this->renderPartial('_follow',array(
		'model'=>$model,
		'type'=>$model->type,
		))
;?> 
<div id="comments">
	<?php if($model->commentCount>=1): ?>
        <h3> 
            <?php echo $model->commentCount>1 ? $model->commentCount . 'comments' : 'One comment'; ?> 
        </h3>
 


		<?php $this->renderPartial('_comment',array(
			'activity'=>$model,
			'comments'=>$model->comments,
		)); ?>
	<?php endif; ?>

	<h3>Leave a Comment</h3>

	<?php if(Yii::app()->user->hasFlash('commentSubmitted')): ?>
		<div class="flash-success">
			<?php echo Yii::app()->user->getFlash('commentSubmitted'); ?>
		</div>
		<?php endif; ?>

		<?php $this->renderPartial('/comment/_form',array(
			'model'=>$comment,
		)); ?>


</div><!-- comments -->