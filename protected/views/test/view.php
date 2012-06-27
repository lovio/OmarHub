<?php
$this->breadcrumbs=array(
	'Tests'=>array('index'),
	$model->testId,
);

$this->menu=array(
	array('label'=>'List Test', 'url'=>array('index')),
	array('label'=>'Create Test', 'url'=>array('create')),
	array('label'=>'Update Test', 'url'=>array('update', 'id'=>$model->testId)),
	array('label'=>'Delete Test', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->testId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Test', 'url'=>array('admin')),
);
?>

<h1>View Test #<?php echo $model->testId; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'userID',
		'testId',
	),
)); ?>
