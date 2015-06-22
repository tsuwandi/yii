<?php

class PromotionController extends CrudController
{

	public function actionView($id)
	{
		$this->render('view', array(
			'model' => $this->loadModel($id),
		));
	}

	public function actionCreate()
	{
		if (!Yii::app()->user->isGuest)
		{
			$model = new Promotion;

			if (isset($_POST['Promotion']))
			{
				$model->attributes = $_POST['Promotion'];
				$model->admin_id = Yii::app()->user->id;
				$model->file = CUploadedFile::getInstance($model, 'file');
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
			$model->scenario = 'uploadImage';

			if (isset($_POST['Promotion']))
			{
				$model->attributes = $_POST['Promotion'];
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

			$this->render('update', array(
				'model' => $model,
			));
		}
		else
			$this->redirect(array('default/login'));
	}

	public function actionDelete($id)
	{
		if (Yii::app()->request->isPostRequest)
		{
			$model = $this->loadModel($id);
			if ($model !== null)
			{
				$model->is_inactive = ActiveRecord::INACTIVE;
				$model->update(array('is_inactive'));
			}

			if (!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
	}

	public function actionAdmin()
	{
		if (!Yii::app()->user->isGuest)
		{
			$model = new Promotion('search');
			$model->unsetAttributes();  // clear any default values
			if (isset($_GET['Promotion']))
			{
				$model->attributes = $_GET['Promotion'];
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
			$originalPath = dirname(Yii::app()->request->scriptFile) . '/images/promotion/' . $model->filename;
			$model->file->saveAs($originalPath);

			require_once( dirname(Yii::app()->request->scriptFile) . '/protected/extensions/phpthumb/ThumbLib.inc.php' );

			$image = PhpThumbFactory::create($originalPath);
			$image->resize(600, 600)->save($originalPath);
		}
	}

	public function loadModel($id)
	{
		$model = Promotion::model()->findByPk($id);
		if ($model === null)
		{
			throw new CHttpException(404, 'The requested page does not exist.');
		}
		return $model;
	}

	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'promotion-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}