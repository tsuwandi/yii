<?php

class DefaultController extends CrudController
{

	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha' => array(
				'class' => 'CCaptchaAction',
				'backColor' => 0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page' => array(
				'class' => 'CViewAction',
			),
		);
	}

	public function actionIndex()
	{
		$this->layout = '/layouts/column1';
		if (!Yii::app()->user->isGuest)
			$this->render('index');
		else
			$this->redirect(array('login'));
	}

	public function actionLogin()
	{
		if (Yii::app()->user->isGuest)
		{
			$this->layout = '/layouts/login';

			$admin = new LoginForm;

			if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form')
			{
				echo CActiveForm::validate($admin);
				Yii::app()->end();
			}

			if (isset($_POST['LoginForm']))
			{
				$admin->attributes = $_POST['LoginForm'];
				if ($admin->validate() && $admin->login())
				{
					$this->redirect(array('index'));
					Yii::app()->end();
				}
			}
		} else
			$this->redirect(array('index'));

		$this->render('login', array('admin' => $admin));
	}

	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(array('login'));
	}

	public function actionError()
	{
		$this->layout = '/layouts/column1';

		if ($error = Yii::app()->errorHandler->error)
		{
			if (Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}
}