<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class BaseInfoForm extends CFormModel
{
	public $firstname;
	public $lastname;
	public $gender;
	public $language;
	public $fieldsofwork;
	public $mobilenumber;
	public $street;
	public $city;
	public $state;
	public $zippostalcode;
	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			//norules
		);
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
			
		);
	}
}