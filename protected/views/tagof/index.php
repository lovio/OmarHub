<?php
$this->breadcrumbs=array(
	'Tagofs',
);

$this->menu=array(
	array('label'=>'Create tagof', 'url'=>array('create')),
	array('label'=>'Manage tagof', 'url'=>array('admin')),
);
?>

<h1>Tagofs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
