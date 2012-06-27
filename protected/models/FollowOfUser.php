<?php

/**
 * This is the model class for table "tbl_followofuser".
 *
 * The followings are the available columns in table 'tbl_followofuser':
 * @property integer $followerid
 * @property integer $userid
 * @property string $followtime
 *
 * The followings are the available model relations:
 * @property TblUser $follower
 * @property TblUser $user
 */
class FollowOfUser extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return FollowOfUser the static model class
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
		return 'tbl_followofuser';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('followerid, userid, followtime', 'required'),
			array('followerid, userid', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('followerid, userid, followtime', 'safe', 'on'=>'search'),
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
			'follower' => array(self::BELONGS_TO, 'TblUser', 'followerid'),
			'user' => array(self::BELONGS_TO, 'TblUser', 'userid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'followerid' => 'Followerid',
			'userid' => 'Userid',
			'followtime' => 'Followtime',
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

		$criteria->compare('followerid',$this->followerid);
		$criteria->compare('userid',$this->userid);
		$criteria->compare('followtime',$this->followtime,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}