<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class FindPasswordForm extends CFormModel
{
	public $email;
	
	private $_identity;

	/**
	 * Declares the validation rules.
	 * The rules state that email and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// email and password are required
			array('email', 'required'),
			// rememberMe needs to be a boolean
			array('email', 'email'),
			// password needs to be authenticated
			//array('password', 'authenticate'),
		);
	}


	public function isEmailRegisted()
	{
		$user = User::model()->findByAttributes(array('email' => $this->email));
		if(!$this->hasErrors())
		{
			if($user===null)
			{
				$this->addError('email','Incorrect email.');
				return false;

			}
			return true;
		}
		return false;
	}

	/**
	 * Logs in the user using the given email and password in the model.
	 * @return boolean whether login is successful
	 */
	public function sendMail($to,$password)
	{
		$subject = "Your new password";
		$message = "
					<html>
					<head>
					<title>New Password</title>
					</head>
					<body>
					<p>Your new password is </p>
					<b>"
					.$password."
					</b>
					</body>
					</html>
					";
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
		$headers .= "From: admin@ashokahub.com" . "\r\n";

		mail($to,$subject,$message,$headers);
	}

	public function generatePassword()
	{
		$table='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
		$text='';
		for($i=0;$i<8;$i++)
		{
			$ch=$table[rand(0,61)];
			$text.=$ch;
		}
		return $text;
	}
}
