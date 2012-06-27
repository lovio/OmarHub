<?php
$this->breadcrumbs=array(
	'Tests'=>array('index'),
	$model->testId=>array('view','id'=>$model->testId),
	'Update',
);

$this->menu=array(
	array('label'=>'List Test', 'url'=>array('index')),
	array('label'=>'Create Test', 'url'=>array('create')),
	array('label'=>'View Test', 'url'=>array('view', 'id'=>$model->testId)),
	array('label'=>'Manage Test', 'url'=>array('admin')),
);
?>

<h1>Update Test <?php echo $model->testId; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>