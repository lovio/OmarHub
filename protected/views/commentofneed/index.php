<?php
$this->breadcrumbs=array(
	'Commentofneeds',
);

$this->menu=array(
	array('label'=>'Create Commentofneed', 'url'=>array('create')),
	array('label'=>'Manage Commentofneed', 'url'=>array('admin')),
);
?>

<h1>Commentofneeds</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
