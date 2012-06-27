<?php
$this->breadcrumbs=array(
	'Tagofs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List tagof', 'url'=>array('index')),
	array('label'=>'Manage tagof', 'url'=>array('admin')),
);
?>

<h1>Create tagof</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>