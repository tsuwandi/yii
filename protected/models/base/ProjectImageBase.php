<?php

/**
 * @property integer $id
 * @property string $file_extension
 * @property integer $project_id
 * @property integer $admin_id
 * @property integer $is_inactive
 *
 * @property Admin $admin
 * @property Project $project
 */
class ProjectImageBase extends ActiveRecord
{
	public function tableName()
	{
		return 'tblpa_project_image';
	}

	public function rules()
	{
		return array(
			array('file_extension, project_id, admin_id', 'required'),
			array('project_id, admin_id, is_inactive', 'numerical', 'integerOnly'=>true),
			array('file_extension', 'length', 'max'=>20),
			// The following rule is used by search().
			array('id, file_extension, project_id, admin_id, is_inactive', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
			'admin' => array(self::BELONGS_TO, 'Admin', 'admin_id'),
			'project' => array(self::BELONGS_TO, 'Project', 'project_id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'file_extension' => 'File Extension',
			'project_id' => 'Project',
			'admin_id' => 'Admin',
			'is_inactive' => 'Is Inactive',
		);
	}

	public function search()
	{
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('file_extension', $this->file_extension, true);
		$criteria->compare('project_id', $this->project_id);
		$criteria->compare('admin_id', $this->admin_id);
		$criteria->compare('is_inactive', $this->is_inactive);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}