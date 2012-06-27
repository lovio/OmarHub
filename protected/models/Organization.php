<?php

/**
 * This is the model class for table "tbl_organization".
 *
 * The followings are the available columns in table 'tbl_organization':
 * @property integer $id
 * @property string $name
 * @property string $acronym
 * @property string $formeddate
 * @property string $website
 * @property integer $type
 * @property integer $employeesnumber
 * @property string $budget
 * @property integer $phonecode
 * @property integer $puonenumber
 * @property string $address
 *
 * The followings are the available model relations:
 * @property TblUser[] $tblUsers
 */
class Organization extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Organization the static model class
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
		return 'tbl_organization';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, acronym, formeddate, website, type, employeesnumber, budget, phonecode, puonenumber, address', 'required'),
			array('type, employeesnumber, phonecode, puonenumber', 'numerical', 'integerOnly'=>true),
			array('name, budget, address', 'length', 'max'=>128),
			array('acronym', 'length', 'max'=>20),
			array('website', 'length', 'max'=>50),
			array('website','url'),
			array('formeddate','date'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, acronym, formeddate, website, type, employeesnumber, budget, phonecode, puonenumber, address', 'safe', 'on'=>'search'),
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
			'tblUsers' => array(self::HAS_MANY, 'TblUser', 'organizationid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'acronym' => 'Acronym',
			'formeddate' => 'Formed date',
			'website' => 'Website',
			'type' => 'Type',
			'employeesnumber' => 'Employees number',
			'budget' => 'Budget',
			'phonecode' => 'Phonecode',
			'puonenumber' => 'Puone number',
			'address' => 'Address',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('acronym',$this->acronym,true);
		$criteria->compare('formeddate',$this->formeddate,true);
		$criteria->compare('website',$this->website,true);
		$criteria->compare('type',$this->type);
		$criteria->compare('employeesnumber',$this->employeesnumber);
		$criteria->compare('budget',$this->budget,true);
		$criteria->compare('phonecode',$this->phonecode);
		$criteria->compare('puonenumber',$this->puonenumber);
		$criteria->compare('address',$this->address,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}