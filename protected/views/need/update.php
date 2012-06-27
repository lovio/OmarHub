<?php
$this->breadcrumbs=array(
	'Needs'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List need', 'url'=>array('index')),
	array('label'=>'Create need', 'url'=>array('create')),
	array('label'=>'View need', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage need', 'url'=>array('admin')),
);
?>

<h1>Update need <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>