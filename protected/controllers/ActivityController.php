<?php

class ActivityController extends Controller
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
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','createoffer','createneed','createevent'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
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
		$activity=$this->loadModel($id);
		$comment=$this->newComment($activity);
		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'comment'=>$comment,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Activity;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Activity']))
		{
			$model->attributes=$_POST['Activity'];
			$model->ownerid=yii::app()->user->id;
			$model->updatetime=time();
			$model->commentCount = 0;
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionCreateOffer()
	{
		$model=new Activity;
		//echo  
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Activity']))
		{
			$model->attributes=$_POST['Activity'];
			$model->ownerid=yii::app()->user->id;
			$model->type = 2;
			$model->publish=1;
			$model->updatetime=time();
			//echo $model->updatetime;
			$model->followers=0;
			$model->addTag($model->filedsofwork,2,$model->id);
			$model->addTag($model->freetag,4,$model->id);
			$model->addTag($model->locationsofwork,1,$model->id);
			$model->addTag($model->targetpopulations,3,$model->id);

			if($model->save());
			{
					//echo $model->updatetime;
					$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
	public function actionCreateNeed()
	{
		$model=new Activity;
		//echo  
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Activity']))
		{
			$model->attributes=$_POST['Activity'];
			$model->ownerid=yii::app()->user->id;
			$model->type = 1;
			$model->publish=1;
			$model->updatetime=time();
			$model->followers=0;

			$model->addTag($model->filedsofwork,2,$model->id);
			$model->addTag($model->freetag,4,$model->id);
			$model->addTag($model->locationsofwork,1,$model->id);
			$model->addTag($model->targetpopulations,3,$model->id);


			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionCreateEvent()
	{
		$model=new Activity;
		//echo  
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Activity']))
		{
			$model->attributes=$_POST['Activity'];
			$model->ownerid=yii::app()->user->id;
			$model->type = 3;
			$model->publish=1;
			$model->updatetime=time();
			$model->followers=0;
			$model->addTag($model->filedsofwork,2,$model->id);
			$model->addTag($model->freetag,4,$model->id);
			$model->addTag($model->locationsofwork,1,$model->id);
			$model->addTag($model->targetpopulations,3,$model->id);
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create_event',array(
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

		if(isset($_POST['Activity']))
		{
			$model->attributes=$_POST['Activity'];
			$model->updatetime=time();
			$model->addTag($model->filedsofwork,2,$model->id);
			$model->addTag($model->freetag,4,$model->id);
			$model->addTag($model->locationsofwork,1,$model->id);
			$model->addTag($model->targetpopulations,3,$model->id);

			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
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
		$dataProvider=new CActiveDataProvider('Activity');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Activity('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Activity']))
			$model->attributes=$_GET['Activity'];

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
		$model=Activity::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	protected function newComment($activity)
	{
		$comment=new Comment;
		if(isset($_POST['ajax'])&&$_POST['ajax']==='comment-form')
		{
			echo CAtiveForm::validate($comment);
			Yii::app()->end();
		}
		if(isset($_POST['Comment']))
		{
			$comment->attributes=$_POST['Comment'];
			if($activity->addComment($comment))
			{
				// if($comment->status==Commentofneed::STATUS_PENDING)
				Yii::app()->user->setFlash('commentSubmitted','Your comment has been added.');
				$this->refresh();
			}
		}
		return $comment;
	}
	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='activity-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
