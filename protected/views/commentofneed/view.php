<?php
$this->breadcrumbs=array(
	'Commentofneeds'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Commentofneed', 'url'=>array('index')),
	array('label'=>'Create Commentofneed', 'url'=>array('create')),
	array('label'=>'Update Commentofneed', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Commentofneed', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Commentofneed', 'url'=>array('admin')),
);
?>

<h1>View Commentofneed #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'authorid',
		'content',
		'updatetime',
		'needid',
	),
)); ?>
