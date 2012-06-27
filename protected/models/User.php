<?php

/**
 * This is the model class for table "tbl_user".
 *
 * The followings are the available columns in table 'tbl_user':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $pic
 * @property integer $firstlogin
 * @property integer $role
 * @property string $firstname
 * @property string $lastname
 * @property string $gender
 * @property string $languages
 * @property string $fieldsofwork
 * @property string $locationsofwork
 * @property string $targetpopulations
 * @property integer $mobilenumbercountrycode
 * @property integer $mobilenumber
 * @property string $mailingaddress
 * @property string $street
 * @property string $city
 * @property string $state
 * @property integer $zippostalcode
 * @property integer $skypeid
 * @property integer $organizationid
 * @property integer $followers
 *
 * The followings are the available model relations:
 * @property TblCommentofcomment[] $tblCommentofcomments
 * @property TblCommentofevent[] $tblCommentofevents
 * @property TblCommentofneed[] $tblCommentofneeds
 * @property TblCommentofoffer[] $tblCommentofoffers
 * @property TblEvent[] $tblEvents
 * @property TblNeed[] $tblNeeds
 * @property TblOffer[] $tblOffers
 * @property TblTag[] $tblTags
 * @property TblFollowofuser[] $tblFollowofusers
 * @property TblFollowofuser[] $tblFollowofusers1
 * @property TblNeed[] $tblNeeds1
 * @property TblOffer[] $tblOffers1
 * @property TblOrganization $organization
 */
class User extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	private $_activity;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_user';
	}

	
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('firstname, lastname, email,role', 'required'),
			array('firstlogin, role, mobilenumbercountrycode, mobilenumber, zippostalcode, skypeid, organizationid, followers', 'numerical', 'integerOnly'=>true),
			array('username', 'length', 'max'=>25),
			array('email','email'),
			array('email, password', 'length', 'max'=>128),
			array('firstname, lastname, fieldsofwork, locationsofwork, targetpopulations, mailingaddress, street, city, state', 'length', 'max'=>60),
			array('gender', 'length', 'max'=>10),
			//array('pic', 'safe'),
			//array('pic','file','types'=>'jpg,gif,png'),
			array('email', 'unique'),
			array('pic', 'file', 'allowEmpty'=>true, 'types'=>'jpg,gif,png',  'maxSize'=>1024 * 1024 * 1,  'tooLarge'=>'头像最大不超过1MB，请重新上传!', ), 
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, email,username,password, pic, firstlogin, role, firstname, lastname, gender, languages, fieldsofwork, locationsofwork, targetpopulations, mobilenumbercountrycode, mobilenumber, mailingaddress, street, city, state, zippostalcode, skypeid, organizationid, followers', 'safe', 'on'=>'search'),
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
			'tblCommentofcomments' => array(self::HAS_MANY, 'TblCommentofcomment', 'authorid'),
			'tblCommentofevents' => array(self::HAS_MANY, 'TblCommentofevent', 'authorid'),
			'tblCommentofneeds' => array(self::HAS_MANY, 'TblCommentofneed', 'authorid'),
			'tblCommentofoffers' => array(self::HAS_MANY, 'TblCommentofoffer', 'authorid'),
			'tblEvents' => array(self::MANY_MANY, 'TblEvent', 'tbl_followofevent(followerid, eventid)'),
			'tblNeeds' => array(self::MANY_MANY, 'TblNeed', 'tbl_followofneed(followerid, needid)'),
			'tblOffers' => array(self::MANY_MANY, 'TblOffer', 'tbl_followofoffer(followerid, offerid)'),
			'tblTags' => array(self::MANY_MANY, 'TblTag', 'tbl_tagofuser(userid, tagid)'),
			'tblFollowofusers' => array(self::HAS_MANY, 'TblFollowofuser', 'userid'),
			'tblFollowofusers1' => array(self::HAS_MANY, 'TblFollowofuser', 'followerid'),
			'tblNeeds1' => array(self::HAS_MANY, 'TblNeed', 'ownerid'),
			'tblOffers1' => array(self::HAS_MANY, 'TblOffer', 'ownerid'),
			'organization' => array(self::BELONGS_TO, 'TblOrganization', 'organizationid'),
			'we_followers'=>array(self::HAS_MANY,'FollowOf','followerid','condition'=>'we_followers.type='.FollowOf::TYPE_USER),
			'we_followerscount'=>array(self::STAT,'FollowOf','followerid','condition'=>'type='.FollowOf::TYPE_USER),
			'we_followings'=>array(self::HAS_MANY,'FollowOf','userid','condition'=>'we_followings.type='.FollowOf::TYPE_USER),
			'we_followingneeds'=>array(self::HAS_MANY,'FollowOf','userid','condition'=>'we_followingneeds.type='.FollowOf::TYPE_NEED,'order'=>'we_followingneeds.followtime DESC'),
			'we_followingoffers'=>array(self::HAS_MANY,'FollowOf','userid','condition'=>'we_followingoffers.type='.FollowOf::TYPE_OFFER,'order'=>'we_followingoffers.followtime DESC'),
			'we_followingevents'=>array(self::HAS_MANY,'FollowOf','userid','condition'=>'we_followingevents.type='.FollowOf::TYPE_EVENT,'order'=>'we_followingevents.followtime DESC'),
			'we_followingtags'=>array(self::HAS_MANY,'FollowOf','userid','condition'=>'we_followingtags.type='.FollowOf::TYPE_TAG,'order'=>'we_followingtags.followtime DESC'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'User name',
			'password' => 'Password',
			'email' => 'Email',
			'pic' => 'Pic',
			'firstlogin' => 'First login',
			'role' => 'Role',
			'firstname' => 'First Name',
			'lastname' => 'Last Name',
			'gender' => 'Gender',
			'languages' => 'Languages',
			'fieldsofwork' => 'Fields of work',
			'locationsofwork' => 'Location sofwork',
			'targetpopulations' => 'Target populations',
			'mobilenumbercountrycode' => 'Mobile number country code',
			'mobilenumber' => 'Mobile number',
			'mailingaddress' => 'Mailing address',
			'street' => 'Street',
			'city' => 'City',
			'state' => 'State',
			'zippostalcode' => 'Zippo stalcode',
			'skypeid' => 'Skypeid',
			'organizationid' => 'Organization id',
			'followers' => 'Followers',
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
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('pic',$this->pic,true);
		$criteria->compare('firstlogin',$this->firstlogin);
		$criteria->compare('role',$this->role);
		$criteria->compare('firstname',$this->firstname,true);
		$criteria->compare('lastname',$this->lastname,true);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('languages',$this->languages,true);
		$criteria->compare('fieldsofwork',$this->fieldsofwork,true);
		$criteria->compare('locationsofwork',$this->locationsofwork,true);
		$criteria->compare('targetpopulations',$this->targetpopulations,true);
		$criteria->compare('mobilenumbercountrycode',$this->mobilenumbercountrycode);
		$criteria->compare('mobilenumber',$this->mobilenumber);
		$criteria->compare('mailingaddress',$this->mailingaddress,true);
		$criteria->compare('street',$this->street,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('state',$this->state,true);
		$criteria->compare('zippostalcode',$this->zippostalcode);
		$criteria->compare('skypeid',$this->skypeid);
		$criteria->compare('organizationid',$this->organizationid);
		$criteria->compare('followers',$this->followers);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	protected function afterValidate() {
	   	parent::afterValidate();
		$this->password = $this->encrypt($this->password);
	}

	public function encrypt($value) {
	    return md5($value);
	} 
	public function getRoleOptions()
	{
		return array(
			'0'=>'Super Admin',
			'1'=>'Omar Fellow',
			);
	}

	public function getGenderOptions()
	{
		return array(
			'0'=>'Male',
			'1'=>'Female',
			);
	}

	public function loadActivity($id)
	{
        if ($this->_activity === null) {
            $this->_activity = Activity::model()->findbyPk($id);
            if ($this->_activity === null) {
                //throw new CHttpException(404, 'The requested activity does not exist.');
            }
        }
        return $this->_activity;
	}

	public function addFollow($id,$type)
	{
		$followtime=date('Y-m-d,H:i:s');
		$sql = "INSERT INTO tbl_followof(userid, type, followtime , followerid) VALUES (:userid,:type,:followtime,:id)";
		$command = Yii::app()->db->createCommand($sql);
    	$command->bindValue(":userid", $this->id, PDO::PARAM_INT); 
    	$command->bindValue(":type", $type, PDO::PARAM_INT); 
    	$command->bindvalue(":followtime",$followtime, PDO::PARAM_INT);
    	$command->bindValue(":id", $id, PDO::PARAM_INT);
    	return $command->execute();
	}

	public function removeFollow($id,$type)
	{
		$sql = "DELETE FROM tbl_followof WHERE userid=:userid AND type=:type AND followerid=:id";
    	$command = Yii::app()->db->createCommand($sql); 
    	$command->bindValue(":userid", $this->id, PDO::PARAM_INT); 
    	$command->bindValue(":type", $type, PDO::PARAM_INT); 
    	$command->bindValue(":id", $id, PDO::PARAM_INT);
    	return $command->execute();
	}
	public function isFollowed($id,$type)
	{
		$userid=Yii::app()->user->id;
		$sql="SELECT * FROM tbl_followof WHERE userid=:userid AND type=:type AND followerid=:followerid";
    	$command = Yii::app()->db->createCommand($sql); 
    	$command->bindValue(":userid", $userid, PDO::PARAM_INT); 
    	$command->bindValue(":type", $type, PDO::PARAM_INT); 
    	$command->bindValue(":followerid", $id, PDO::PARAM_INT); 
    	return $command->execute()==1?true:false;
	}
}
