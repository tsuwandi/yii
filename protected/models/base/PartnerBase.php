<?php

/**
 * @property integer $id
 * @property string $file_extension
 * @property string $updated_time
 * @property integer $admin_id
 * @property integer $is_inactive
 *
 * @property Admin $admin
 */
class PartnerBase extends ActiveRecord
{
	public function tableName()
	{
		return 'tblpa_partner';
	}

	public function rules()
	{
		return array(
			array('file_extension, admin_id', 'required'),
			array('file', 'file', 'types' => 'jpg, gif, png', 'maxSize' => 1024 * 1024 * 10, 'allowEmpty' => true,
				'wrongType' => 'Please upload only images in the format jpg, gif, png', 'on' => 'insert, update',
				'tooLarge' => 'The file was larger than 10MB. Please upload a smaller file.', 'on' => 'insert, update'),
			array('admin_id, is_inactive', 'numerical', 'integerOnly'=>true),
			array('file_extension', 'length', 'max'=>20),
			// The following rule is used by search().
			array('id, file_extension, updated_time, admin_id, is_inactive', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
			'admin' => array(self::BELONGS_TO, 'Admin', 'admin_id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'file_extension' => 'File Extension',
			'updated_time' => 'Updated Time',
			'admin_id' => 'Admin',
			'is_inactive' => 'Is Inactive',
		);
	}

	public function search()
	{
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('file_extension', $this->file_extension, true);
		$criteria->compare('updated_time', $this->updated_time, true);
		$criteria->compare('admin_id', $this->admin_id);
		$criteria->compare('is_inactive', $this->is_inactive);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}