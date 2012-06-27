<?php
$this->breadcrumbs=array(
	'Needs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List need', 'url'=>array('index')),
	array('label'=>'Manage need', 'url'=>array('admin')),
);
?>

<h1>Create need</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>