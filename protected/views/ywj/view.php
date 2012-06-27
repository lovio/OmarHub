<?php
$this->breadcrumbs=array(
	'Ywjs'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List ywj', 'url'=>array('index')),
	array('label'=>'Create ywj', 'url'=>array('create')),
	array('label'=>'Update ywj', 'url'=>array('update', 'id'=>$model->name)),
	array('label'=>'Delete ywj', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->name),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ywj', 'url'=>array('admin')),
);
?>

<h1>View ywj #<?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'name',
	),
)); ?>
