	<?php 
		  if($model->isFollowed($model->id,$type)) 
			echo CHtml::link('UnFollow',array('user/Unfollow','id'=>$model->id,'type'=>$type));
		  else
			echo CHtml::link('Follow',array('user/Follow','id'=>$model->id,'type'=>$type));
	?> 
	<br />