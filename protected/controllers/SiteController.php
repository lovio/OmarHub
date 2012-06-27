<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
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
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('login','logout'),
				'users'=>array('*'),
			),

			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('index'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$user = User::model()->findByPk(Yii::app()->user->id);
		$we_followers=$user->we_followers;
		$we_followings=$user->we_followings;
		$we_followingneeds=$user->we_followingneeds;
		$we_followingoffers=$user->we_followingoffers;
		$we_followingevents=$user->we_followingevents;
		$dataProvider=new CActiveDataProvider('Activity', array(
	    	'criteria'=>array(
	        'condition'=>'ownerid='.Yii::app()->user->id,
	        'order'=>'updatetime DESC',
	        //'with'=>array('author'),
	    	),
	    	'pagination'=>array(
	        'pageSize'=>20,
	    	),
		));
		$followerArr = $this->getFollower();
		$this->render('index',array('user'=>$user,'we_followers'=>$we_followers,
			'we_followings'=>$we_followings,'we_followingneeds'=>$we_followingneeds,
			'we_followingoffers'=>$we_followingoffers,'we_followingevents'=>$we_followingevents,
			'dataProvider'=>$dataProvider,'followerArr'=>$followerArr));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$headers="From: {$model->email}\r\nReply-To: {$model->email}";
				mail(Yii::app()->params['adminEmail'],$model->subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$this->redirect(array('/login'));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

	protected function getFollower()
	{
		$dataProvider=new CActiveDataProvider('FollowOF', array(
	    	'criteria'=>array(
	        'condition'=>'userid='.Yii::app()->user->id.' and type=4',
	        'order'=>'followtime DESC',
	        //'with'=>array('author'),
	    	),
	    	'pagination'=>array(
	        'pageSize'=>20,
	    	),
		));
		$followerArr = array();
		foreach ($dataProvider->data as $key =>$value) {
			$followerArr[$key]=User::model()->findByPk($value->followerid);
		}
		return $followerArr;
	}
}