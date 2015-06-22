<?php

class AdminModule extends CWebModule
{
	public function init()
	{
		$this->setImport(array(
			'admin.models.*',
			'admin.components.*',
		));
		
		Yii::app()->setComponents(array(
			'errorHandler' => array(
				'errorAction' => 'admin/default/error',
		)));
	}

	public function beforeControllerAction($controller, $action)
	{
		if (parent::beforeControllerAction($controller, $action))
			return true;
		else
			return false;
	}
}
