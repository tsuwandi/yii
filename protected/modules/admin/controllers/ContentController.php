<?php

class ContentController extends CrudController
{

	public function actionView($id)
	{
		if (!Yii::app()->user->isGuest)
		{
			$this->render('view', array(
				'model' => $this->loadModel($id),
			));
		}
		else
			$this->redirect(array('default/login'));
	}

	public function actionCreate()
	{
		if (!Yii::app()->user->isGuest)
		{
			$model = new Content;

			if (isset($_POST['Content']))
			{
				$model->attributes = $_POST['Content'];
				$model->file = CUploadedFile::getInstance($model, 'file');
				$model->admin_id = Yii::app()->user->id;
				if ($model->save())
				{
					$this->saveImageFile($model);
					$this->redirect(array('view', 'id' => $model->id));
				}
			}

			$this->render('create', array(
				'model' => $model,
			));
		}
		else
			$this->redirect(array('default/login'));
	}

	public function actionUpdate($id)
	{
		if (!Yii::app()->user->isGuest)
		{
			$model = $this->loadModel($id);

			if (isset($_POST['Content']))
			{
				$model->attributes = $_POST['Content'];
				$model->admin_id = Yii::app()->user->id;
				$fields = array('content_name', 'description', 'admin_id');
				if ($model->validate($fields) && $model->update($fields))
				{
					$this->redirect(array('view', 'id' => $model->id));
				}
			}

			$this->render('update', array(
				'model' => $model,
			));
		}
		else
			$this->redirect(array('default/login'));
	}

	public function actionUploadImage($id)
	{
		if (!Yii::app()->user->isGuest)
		{
			$model = $this->loadModel($id);
			$model->scenario = 'uploadImage';

			if (isset($_POST['Content']))
			{
				$model->attributes = $_POST['Content'];
				$model->admin_id = Yii::app()->user->id;
				$model->file = CUploadedFile::getInstance($model, 'file');
				$validateFields = array('file', 'file_extension');
				$updateFields = array('file_extension', 'admin_id');

				if ($model->validate($validateFields) && $model->update($updateFields))
				{
					$this->saveImageFile($model);
					$this->redirect(array('view', 'id' => $model->id));
				}
			}

			$this->render('uploadImage', array(
				'model' => $model,
			));
		}
		else
			$this->redirect(array('default/login'));
	}

	public function actionAdmin()
	{
		if (!Yii::app()->user->isGuest)
		{
			$model = new Content('search');
			$model->unsetAttributes();  // clear any default values
			if (isset($_GET['Content']))
			{
				$model->attributes = $_GET['Content'];
			}

			$this->render('admin', array(
				'model' => $model,
			));
		}
		else
			$this->redirect(array('default/login'));
	}

	public function saveImageFile($model)
	{
		if ($model->file)
		{
			$originalPath = dirname(Yii::app()->request->scriptFile) . '/images/content/' . $model->filename;
			$model->file->saveAs($originalPath);

			require_once( dirname(Yii::app()->request->scriptFile) . '/protected/extensions/phpthumb/ThumbLib.inc.php' );

			$image = PhpThumbFactory::create($originalPath);
			$image->resize(680, 300)->save($originalPath);
		}
	}

	public function loadModel($id)
	{
		$model = Content::model()->findByPk($id);
		if ($model === null)
		{
			throw new CHttpException(404, 'The requested page does not exist.');
		}
		return $model;
	}

	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'content-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

