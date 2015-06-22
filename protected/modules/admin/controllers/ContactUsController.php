<?php

class ContactUsController extends CrudController
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
			$model = new ContactUs;

			if (isset($_POST['ContactUs']))
			{
				$model->attributes = $_POST['ContactUs'];
				$model->admin_id = Yii::app()->user->id;
				if ($model->save())
				{
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

			if (isset($_POST['ContactUs']))
			{
				$model->attributes = $_POST['ContactUs'];
				$model->admin_id = Yii::app()->user->id;
				if ($model->save())
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

	public function actionDelete($id)
	{
		if (Yii::app()->request->isPostRequest)
		{
			$this->loadModel($id)->delete();

			if (!isset($_GET['ajax']))
			{
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
			}
		}
		else
		{
			throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
		}
	}

	public function actionAdmin()
	{
		if (!Yii::app()->user->isGuest)
		{
			$model = new ContactUs('search');
			$model->unsetAttributes();  // clear any default values
			if (isset($_GET['ContactUs']))
			{
				$model->attributes = $_GET['ContactUs'];
			}

			$this->render('admin', array(
				'model' => $model,
			));
		}
		else
			$this->redirect(array('default/login'));
	}

	public function loadModel($id)
	{
		$model = ContactUs::model()->findByPk($id);
		if ($model === null)
		{
			throw new CHttpException(404, 'The requested page does not exist.');
		}
		return $model;
	}

	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'contact-us-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

