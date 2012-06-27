<?php

class LoginController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public $layout='//layouts/column';
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}


	/**
	 * Displays the login page
	 */
	public function actionIndex()
	{
		$model=new LoginForm;
		
		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			$model->email=trim($model->email);
			// validate user input and redirect to the previous page if valid
			
			if($model->login())
			{
				$this->redirect(array('/'));
			}
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	public function actionFindpassword()
	{	
		$model = new FindPasswordForm;
		if(isset($_POST['FindPasswordForm']))
		{
			$model->attributes=$_POST['FindPasswordForm'];
			if($model->isEmailRegisted())
			{
				$pwd=$model->generatePassword();
				$model->sendMail($model->email,$pwd);
				$user= User::model()->findByAttributes(array('email' => $model->email));
				$user->password=$pwd;
				//$user->password = $user->encrypt($pwd);
				$user->save();
				$this->redirect(array('/login'));
			}
		}
		$this->render('findpassword',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(array('/login'));
	}
}