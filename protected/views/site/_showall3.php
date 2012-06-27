<?php 
        $this->beginWidget('zii.widgets.jui.CJuiDialog', array(

        'id'=>'MyDialog3',
        'options'=>array(

        'title'=>Yii::t('query','the activity you follow'),

        'autoOpen'=>false,

        'modal'=>'true',

        'width'=>'600',

        'height'=>'500',

    ),

));
?>
<li>needs:</li>
<?php
    foreach($needmodels as $model): 
    ?>
          <li><?php
             //$need=Activity::Model 
             $need=Activity::model()->findByPk($model->followerid);
             echo CHtml::link($need->title,array('activity/view','id'=>$need->id)); 
                 $this->renderPartial('/activity/_follow',array(
                   'model'=>$need,
                   'type'=>$need->type,
     ));
              ?>
          </li>
		<?php    endforeach; ?>
 <li>offers:</li>
<?php
   foreach($offermodels as $model): 
    ?>
          <li><?php 
             $offer=Activity::model()->findByPk($model->followerid);
            echo CHtml::link($offer->title,array('activity/view','id'=>$offer->id)); 
                  $this->renderPartial('/activity/_follow',array(
                  'model'=>$offer,
                  'type'=>$offer->type,
    ))
              ?>
          </li>
    <?php     endforeach; ?>

<li>events:</li>
<?php
   foreach($eventmodels as $model): 
    ?>
          <li><?php 
            $event=Activity::model()->findByPk($model->followerid);
            echo CHtml::link($event->title,array('activity/view','id'=>$event->id)); 
                  $this->renderPartial('/activity/_follow',array(
                  'model'=>$event,
                  'type'=>$event->type,
    ))
              ?>
          </li>
    <?php     endforeach; ?>
<?php

$this->endWidget('zii.widgets.jui.CJuiDialog');
// the link that may open the dialog

echo CHtml::link('showall','#',array(

   'onclick'=>'$("#MyDialog3").dialog("open"); return false;',

));

?>