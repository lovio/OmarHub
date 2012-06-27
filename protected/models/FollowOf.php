<?php

/**
 * This is the model class for table "tbl_followof".
 *
 * The followings are the available columns in table 'tbl_followof':
 * @property integer $userid
 * @property integer $type
 * @property string $followtime
 * @property integer $followerid
 *
 * The followings are the available model relations:
 * @property TblUser $user
 */
class FollowOF extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return FollowOF the static model class
	 */
	const TYPE_NEED=1;
	const TYPE_OFFER=2;
	const TYPE_EVENT=3;
	const TYPE_USER=4;
	const TYPE_TAG=5;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_followof';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('userid, type, followtime, followerid', 'required'),
			array('userid, type, followerid', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('userid, type, followtime, followerid', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'User', 'userid'),
			'follower'=>array(self::BELONGS_TO,'User','followerid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'userid' => 'Userid',
			'type' => 'Type',
			'followtime' => 'Followtime',
			'followerid' => 'Followerid',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	protected function beforeSave()
	{
		if(parent::beforeSave())
		{
			if($this->isNewRecord)
				$this->followtime=date('Y-m-d,H:i:s');
			return true;
		}
		else
			return false;
	}

	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('userid',$this->userid);
		$criteria->compare('type',$this->type);
		$criteria->compare('followtime',$this->followtime,true);
		$criteria->compare('followerid',$this->followerid);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}