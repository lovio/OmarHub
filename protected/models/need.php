<?php

/**
 * This is the model class for table "tbl_need".
 *
 * The followings are the available columns in table 'tbl_need':
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $filedsofwork
 * @property string $locationsofwork
 * @property string $targetpopulations
 * @property integer $ownerid
 * @property string $updatetime
 * @property string $commenttime
 * @property integer $followers
 *
 * The followings are the available model relations:
 * @property TblCommentofneed[] $tblCommentofneeds
 * @property TblUser[] $tblUsers
 * @property TblUser $owner
 * @property TblTag[] $tblTags
 */
class need extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return need the static model class
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
		return 'tbl_need';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, description', 'required'),
			array('ownerid, followers', 'numerical', 'integerOnly'=>true),
			array('title, filedsofwork, locationsofwork, targetpopulations', 'length', 'max'=>128),
			array('description', 'length', 'max'=>1000),
			array('commenttime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, description, filedsofwork, locationsofwork, targetpopulations, ownerid, updatetime, commenttime, followers', 'safe', 'on'=>'search'),
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
			'tblCommentofneeds' => array(self::HAS_MANY, 'Commentofneed', 'needid'),
			'tblUsers' => array(self::MANY_MANY, 'User', 'tbl_followofneed(needid, followerid)'),
			'owner' => array(self::BELONGS_TO, 'User', 'ownerid'),
			'tblTags' => array(self::MANY_MANY, 'Tag', 'tbl_tagofneed(needid, tagid)'),
			'comments' => array(self::HAS_MANY, 'Commentofneed', 'needid', 'order'=>'comments.updatetime DESC'),
			'commentCount' => array(self::STAT, 'Commentofneed', 'needid'),
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
			'filedsofwork' => 'Fileds of work',
			'locationsofwork' => 'Locations of work',
			'targetpopulations' => 'Target populations',
			'ownerid' => 'Ownerid',
			'updatetime' => 'Updatetime',
			'commenttime' => 'Commenttime',
			'followers' => 'Followers',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */

	public function getUrl()
	{
		return Yii::app()->createUrl('need/view', array(
			'id'=>$this->id,
			'title'=>$this->title,
		));
	}
	//get the url
	public function addComment($comment)
	{
		$comment->authorid=Yii::app()->user->id;
		$comment->needid=$this->id;
		$comment->publisherid=$this->owner->id;
		$comment->updatetime=time();
		return $comment->save();
	}
	//add comment
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
		$criteria->compare('ownerid',$this->ownerid);
		$criteria->compare('updatetime',$this->updatetime,true);
		$criteria->compare('commenttime',$this->commenttime,true);
		$criteria->compare('followers',$this->followers);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}