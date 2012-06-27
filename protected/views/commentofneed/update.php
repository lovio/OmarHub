<?php
$this->breadcrumbs=array(
	'Commentofneeds'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Commentofneed', 'url'=>array('index')),
	array('label'=>'Create Commentofneed', 'url'=>array('create')),
	array('label'=>'View Commentofneed', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Commentofneed', 'url'=>array('admin')),
);
?>

<h1>Update Commentofneed <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>