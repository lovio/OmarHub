<?php
$this->breadcrumbs=array(
	'Commentofneeds'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Commentofneed', 'url'=>array('index')),
	array('label'=>'Manage Commentofneed', 'url'=>array('admin')),
);
?>

<h1>Create Commentofneed</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>