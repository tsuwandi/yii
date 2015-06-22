<?php

class Content extends ContentBase
{
	public $file;
	
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}

	public function getFilename()
	{
		return 'Content_'. $this->id . '.' . $this->file_extension;
	}
	
	protected function beforeValidate()
	{
		if (parent::beforeValidate())
		{
			if ($this->file)
				$this->file_extension = $this->file->extensionName;

			return true;
		}
		else
		{
			return false;
		}
	}
}