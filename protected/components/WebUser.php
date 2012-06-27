<?php
	class WebUser extends CWebUser
	{
		public function isAuthor($id)
		{
			if(Yii::app()->user->id===$id)
				return true;
			else
				return false;
		} 
	}
?>