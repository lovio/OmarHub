<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	//$model->id=>array('view','id'=>$model->id),
	'Change password',
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'View User', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<h1>Change password</h1>

<?php echo $this->renderPartial('_form_changepassword', array('model'=>$model)); ?>