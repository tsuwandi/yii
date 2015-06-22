<?php

class PublicModule extends CWebModule
{
	public function init()
	{
		parent::init();
        Yii::app()->setComponents(array(
                'errorHandler'=>array(
                        'errorAction'=>'public/default/error',
                ),
        ));
		
		$this->setImport(array(
			'public.models.*',
			'public.components.*',
		));
	}

	public function beforeControllerAction($controller, $action)
	{
		if (parent::beforeControllerAction($controller, $action))
			return true;
		else
			return false;
	}
}
