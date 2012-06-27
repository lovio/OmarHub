<?php 
        $this->beginWidget('zii.widgets.jui.CJuiDialog', array(

        'id'=>'MyDialog2',
        'options'=>array(

        'title'=>Yii::t('query','the people you follow'),

        'autoOpen'=>false,

        'modal'=>'true',

        'width'=>'600',

        'height'=>'500',

    ),

));
?>
<?php

   foreach($models as $model): 
    ?>
          <li><?php echo CHtml::link($model->follower->username,array('user/view','id'=>$model->followerid)); 
                  $this->renderPartial('/activity/_follow',array(
                  'model'=>$model->follower,
                  'type'=>$type,
    ))
              ?>
          </li>
		<?php     endforeach;

$this->endWidget('zii.widgets.jui.CJuiDialog');
// the link that may open the dialog

echo CHtml::link('showall','#',array(

   'onclick'=>'$("#MyDialog2").dialog("open"); return false;',

));

?>