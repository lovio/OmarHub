<?php

/**
 * This is the model class for table "tbl_activity".
 *
 * The followings are the available columns in table 'tbl_activity':
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $filedsofwork
 * @property string $locationsofwork
 * @property string $targetpopulations
 * @property string $startdate
 * @property integer $onedayevent
 * @property string $enddate
 * @property integer $ownerid
 * @property string $updatetime
 * @property integer $followers
 * @property integer $type
 * @property integer $publish
 *
 * The followings are the available model relations:
 * @property TblUser $owner
 */
class Activity extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Activity the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_activity';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, description, ownerid, updatetime, followers, type, publish', 'required'),
			array('onedayevent, ownerid, followers, type, publish', 'numerical', 'integerOnly'=>true),
			array('title, filedsofwork, locationsofwork, targetpopulations, freetag', 'length', 'max'=>128),
			array('description', 'length', 'max'=>2000),
			array('startdate, enddate', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, description, filedsofwork, locationsofwork, targetpopulations, freetag, startdate, onedayevent, enddate, ownerid, updatetime, followers, type, publish', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'owner' => array(self::BELONGS_TO, 'User', 'ownerid'),
			'comments' => array(self::HAS_MANY, 'Comment', 'activityid', 'order'=>'comments.updatetime DESC'),
			'commentCount' => array(self::STAT, 'Comment', 'activityid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'description' => 'Description',
			'filedsofwork' => 'Filedsofwork',
			'locationsofwork' => 'Locationsofwork',
			'targetpopulations' => 'Targetpopulations',
			'freetag'=>'Free tag',
			'startdate' => 'Startdate',
			'onedayevent' => 'Onedayevent',
			'enddate' => 'Enddate',
			'ownerid' => 'Ownerid',
			'updatetime' => 'Updatetime',
			'followers' => 'Followers',
			'type' => 'Type',
			'publish' => 'Publish',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('filedsofwork',$this->filedsofwork,true);
		$criteria->compare('locationsofwork',$this->locationsofwork,true);
		$criteria->compare('targetpopulations',$this->targetpopulations,true);
		$criteria->compare('freetag',$this->freetag,true);
		$criteria->compare('startdate',$this->startdate,true);
		$criteria->compare('onedayevent',$this->onedayevent);
		$criteria->compare('enddate',$this->enddate,true);
		$criteria->compare('ownerid',$this->ownerid);
		$criteria->compare('updatetime',$this->updatetime,true);
		$criteria->compare('followers',$this->followers);
		$criteria->compare('type',$this->type);
		$criteria->compare('publish',$this->publish);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function addComment($comment)
	{
		$this->commentCount = $this->commentCount+1;
		$this->save();
		$comment->authorid=Yii::app()->user->id;
		$comment->activityid=$this->id;
		$comment->publisherid=$this->owner->id;
		$comment->updatetime=time();
		return $comment->save();
	}

	public function isFollowed($id,$type)
	{
		$userid=Yii::app()->user->id;
		$sql="SELECT userid FROM tbl_followof WHERE userid=:userid AND type=:type AND followerid=:followerid";
    	$command = Yii::app()->db->createCommand($sql); 
    	$command->bindValue(":userid",$userid, PDO::PARAM_INT); 
    	$command->bindValue(":type",$type, PDO::PARAM_INT); 
    	$command->bindValue(":followerid",$id, PDO::PARAM_INT); 
    	return $command->execute()==1?true:false;
	}

	public function addTag($name,$type,$modelid)
	{
		$tag=new Tag;
		if(!Tag::model()->find('name=:name',array(':name'=>$name)))
		{
			$tag->name=$name;
			$tag->tagtype=$type;
			$tag->save();
		}
/*		$tag=Tag::model()->find('name=:name',array(':name'=>$name));
		$tagid=$tag->id;
		$tagof=new tagof;
		$tagof->paid=$modelid;
		$tagof->tagid=$tagid;
		$tagof->save();*/

	}

}