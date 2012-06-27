<?php

class UserController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

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
				'actions'=>array('index','view','follow','unfollow'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('update','edit','Changepassword','updateorganization'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','create','createorganzation'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}
	/**
	 *
	*/
	public function actionChangepassword()
	{
		$model=$this->loadModel(Yii::app()->user->id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('changepassword',array(
			'model'=>$model,
		));
	}
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new User;
		$model1=new FindPasswordForm;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			$model->username = $model->firstname." ".$model->lastname;
			$pwd=$model1->generatePassword();
			$model1->sendMail($model->email,$pwd);
			$model->password=$pwd;
			//$model->password = 'default';
			$model->pic = 'default.jpg';
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));

		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$image = CUploadedFile::getInstance($model, 'pic'); 
			$pic = $model->pic;
			$model->attributes=$_POST['User'];
			if(!$model->pic)$model->pic = $pic;

			$model->username = $model->firstname." ".$model->lastname;

			if( is_object($image) && get_class($image) === 'CUploadedFile' ){  
				//echo $model->pic;
    			$model->pic = 'avatar'.$id.'.jpg';  
			}

			if($model->save())
			{

				if(is_object($image)&& get_class($image) === 'CUploadedFile'){ 
					
        			$image->saveAs(Yii::app()->basePath.'/../uploads/'.$model->pic);  
    			}  
				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
	public function actionEdit()
	{
		$this->redirect(array('/user/update','id'=>Yii::app()->user->id));
	}
	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('User');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function actionCreateOrganzation()
	{
		$this->redirect(array('/organization/create'));
	}
	/**
	 * Manages all models.
	 */
	public function actionUpdateOrganization()
	{
		
		$this->redirect(array('/organization/update'));
	}
	public function actionAdmin()
	{
		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=User::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}


	public function actionFollow($id,$type)
	{
		$model=$this->loadModel(Yii::app()->user->id);
		if($model->isFollowed($id,$type))
		{
			echo 'You cannot follow this again.';
		}
		if($model->addFollow($id,$type))
			$this->redirect(Yii::app()->request->urlReferrer);
	}
	//unfollowsomething
	public function actionUnfollow($id,$type)
	{
		$model=$this->loadModel(Yii::app()->user->id);
		if(!$model->isFollowed($id,$type))
		{
			echo 'You have not follow this.';
		}
		if($model->removeFollow($id,$type))
		{
			$this->redirect(Yii::app()->request->urlReferrer);
		}
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
