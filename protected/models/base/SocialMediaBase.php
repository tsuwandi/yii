<?php

/**
 * @property integer $id
 * @property string $name
 * @property string $link
 * @property string $updated_time
 * @property integer $admin_id
 * @property integer $is_inactive
 *
 * @property Admin $admin
 */
class SocialMediaBase extends ActiveRecord
{
	public function tableName()
	{
		return 'tblpa_social_media';
	}

	public function rules()
	{
		return array(
			array('name, link, updated_time, admin_id', 'required'),
			array('admin_id, is_inactive', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>60),
			array('link', 'length', 'max'=>255),
			// The following rule is used by search().
			array('id, name, link, updated_time, admin_id, is_inactive', 'safe', 'on'=>'search'),
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
			'name' => 'Name',
			'link' => 'Link',
			'updated_time' => 'Updated Time',
			'admin_id' => 'Admin',
			'is_inactive' => 'Is Inactive',
		);
	}

	public function search()
	{
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('name', $this->name, true);
		$criteria->compare('link', $this->link, true);
		$criteria->compare('updated_time', $this->updated_time, true);
		$criteria->compare('admin_id', $this->admin_id);
		$criteria->compare('is_inactive', $this->is_inactive);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}