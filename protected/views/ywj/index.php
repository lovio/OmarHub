<?php
$this->breadcrumbs=array(
	'Ywjs',
);

$this->menu=array(
	array('label'=>'Create ywj', 'url'=>array('create')),
	array('label'=>'Manage ywj', 'url'=>array('admin')),
);
?>

<h1>Ywjs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
