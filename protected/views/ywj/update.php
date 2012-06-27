<?php
$this->breadcrumbs=array(
	'Ywjs'=>array('index'),
	$model->name=>array('view','id'=>$model->name),
	'Update',
);

$this->menu=array(
	array('label'=>'List ywj', 'url'=>array('index')),
	array('label'=>'Create ywj', 'url'=>array('create')),
	array('label'=>'View ywj', 'url'=>array('view', 'id'=>$model->name)),
	array('label'=>'Manage ywj', 'url'=>array('admin')),
);
?>

<h1>Update ywj <?php echo $model->name; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>