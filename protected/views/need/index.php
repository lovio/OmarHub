<?php
$this->breadcrumbs=array(
	'Needs',
);

$this->menu=array(
	array('label'=>'Create need', 'url'=>array('create')),
	array('label'=>'Manage need', 'url'=>array('admin')),
);
?>

<h1>Needs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
