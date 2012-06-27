<?php
$this->breadcrumbs=array(
	'Tagofs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List tagof', 'url'=>array('index')),
	array('label'=>'Create tagof', 'url'=>array('create')),
	array('label'=>'View tagof', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage tagof', 'url'=>array('admin')),
);
?>

<h1>Update tagof <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>