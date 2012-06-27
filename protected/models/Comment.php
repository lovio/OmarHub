<?php

/**
 * This is the model class for table "tbl_comment".
 *
 * The followings are the available columns in table 'tbl_comment':
 * @property integer $id
 * @property integer $authorid
 * @property string $content
 * @property string $updatetime
 * @property integer $activityid
 * @property integer $publisherid
 *
 * The followings are the available model relations:
 * @property TblActivity $activity
 * @property TblUser $publisher
 * @property TblUser $author
 */
class Comment extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Comment the static model class
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
		return 'tbl_comment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('authorid, content, updatetime, activityid, publisherid', 'required'),
			array('authorid, activityid, publisherid', 'numerical', 'integerOnly'=>true),
			array('content', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, authorid, content, updatetime, activityid, publisherid', 'safe', 'on'=>'search'),
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
			'activity' => array(self::BELONGS_TO, 'Activity', 'activityid'),
			'publisher' => array(self::BELONGS_TO, 'User', 'publisherid'),
			'author' => array(self::BELONGS_TO, 'User', 'authorid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'authorid' => 'Authorid',
			'content' => 'Content',
			'updatetime' => 'Updatetime',
			'activityid' => 'Activityid',
			'publisherid' => 'Publisherid',
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
				$this->updatetime=date('Y-m-d,H:i:s');
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

		$criteria->compare('id',$this->id);
		$criteria->compare('authorid',$this->authorid);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('updatetime',$this->updatetime,true);
		$criteria->compare('activityid',$this->activityid);
		$criteria->compare('publisherid',$this->publisherid);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function isAuthor($id)
	{
		$userid=Yii::app()->user->id;
		return $userid==$id?true:false;
	}

}