<?php

class Admin extends AdminBase
{
	public $current_password = '';
	public $new_password = '';
	public $confirm_password = '';

	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}

	public function getHash($word)
	{
		return sha1($this->username . $word . $this->salt);
	}

	public function checkPassword($password)
	{
		return $this->password === $this->getHash($password);
	}

	protected function beforeSave()
	{
		if (parent::beforeSave())
		{
			$this->salt = md5(uniqid());
			$this->password = $this->getHash($this->new_password);

			return true;
		} else
			return false;
	}

	public function authenticatePassword($attribute, $params)
	{
		if (!$this->checkPassword($this->$attribute))
			$this->addError($attribute, 'Password is incorrect');
	}
}