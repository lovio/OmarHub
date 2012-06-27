<?php
$this->breadcrumbs=array(
	'Tagofs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List tagof', 'url'=>array('index')),
	array('label'=>'Create tagof', 'url'=>array('create')),
	array('label'=>'Update tagof', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete tagof', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage tagof', 'url'=>array('admin')),
);
?>

<h1>View tagof #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'paid',
		'tagid',
	),
)); ?>
