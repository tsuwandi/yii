<?php

class AdminController extends CrudController
{
	public function actionView($id)
	{
		if (!Yii::app()->user->isGuest)
		{
			$this->render('view', array(
				'model' => $this->loadModel($id),
			));
		} else
			$this->redirect(array('default/login'));
	}
	
	public function actionCreate()
	{
		if (!Yii::app()->user->isGuest)
		{
			$model = new Admin;

			if (isset($_POST['Admin']))
			{
				$model->attributes = $_POST['Admin'];
				if ($model->save())
				{
					$this->redirect(array('view', 'id' => $model->id));
				}
			}

			$this->render('create', array(
				'model' => $model,
			));
		} else
			$this->redirect(array('default/login'));
	}
	
	public function actionUpdate($id)
	{
		if (!Yii::app()->user->isGuest)
		{
			$model = $this->loadModel($id);

			if (isset($_POST['Admin']))
			{
				$model->attributes = $_POST['Admin'];
				$fields = array('name', 'address', 'phone', 'cell_phone', 'email');
				if ($model->validate($fields) && $model->update($fields))
				{
					$this->redirect(array('view', 'id' => $model->id));
				}
			}

			$this->render('update', array(
				'model' => $model,
			));
		} else
			$this->redirect(array('default/login'));
	}

	public function actionChangePassword($id)
	{
		if (!Yii::app()->user->isGuest)
		{
			$model = $this->loadModel($id);
			$model->scenario = 'changePassword';

			if (isset($_POST['Admin']))
			{
				$model->attributes = $_POST['Admin'];
				$validateFields = array('current_password', 'new_password', 'confirm_password');
				$updateFields = array('password', 'salt');

				if ($model->validate($validateFields) && $model->update($updateFields))
					$this->redirect(array('view', 'id' => $model->id));
			}

			$this->render('changePassword', array(
				'model' => $model,
			));
		} else
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
		} else
			throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
	}

	public function actionAdmin()
	{
		if (!Yii::app()->user->isGuest)
		{
			$model = new Admin('search');
			$model->unsetAttributes();  // clear any default values
			if (isset($_GET['Admin']))
			{
				$model->attributes = $_GET['Admin'];
			}

			$this->render('admin', array(
				'model' => $model,
			));
		} else
			$this->redirect(array('default/login'));
	}

	public function loadModel($id)
	{
		$model = Admin::model()->findByPk($id);
		if ($model === null)
		{
			throw new CHttpException(404, 'The requested page does not exist.');
		}
		return $model;
	}

	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'admin-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

