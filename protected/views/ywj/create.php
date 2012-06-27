<?php
$this->breadcrumbs=array(
	'Ywjs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ywj', 'url'=>array('index')),
	array('label'=>'Manage ywj', 'url'=>array('admin')),
);
?>

<h1>Create ywj</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>