<?php

class ProjectImage extends ProjectImageBase
{

	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}

	public function getFilename()
	{
		return $this->id . '.' . $this->file_extension;
	}
}