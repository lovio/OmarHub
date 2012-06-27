<?php

/**
 * This is the model class for table "tbl_offer".
 *
 * The followings are the available columns in table 'tbl_offer':
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
 * @property TblCommentofoffer[] $tblCommentofoffers
 * @property TblUser[] $tblUsers
 * @property TblUser $owner
 * @property TblTag[] $tblTags
 */
class Offer extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Offer the static model class
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
		return 'tbl_offer';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, description, ownerid, updatetime', 'required'),
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
			'tblCommentofoffers' => array(self::HAS_MANY, 'TblCommentofoffer', 'offerid'),
			'tblUsers' => array(self::MANY_MANY, 'TblUser', 'tbl_followofoffer(offerid, followerid)'),
			'owner' => array(self::BELONGS_TO, 'TblUser', 'ownerid'),
			'tblTags' => array(self::MANY_MANY, 'TblTag', 'tbl_tagofoffer(offerid, tagid)'),
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