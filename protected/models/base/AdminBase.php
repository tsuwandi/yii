<?php

/**
 * @property integer $id
 * @property string $updated_time
 * @property string $name
 * @property string $username
 * @property string $password
 * @property string $salt
 * @property string $address
 * @property string $phone
 * @property string $cell_phone
 * @property string $email
 * @property integer $is_inactive
 * 
 * @property ContactUs[] $contactUses
 * @property Content[] $contents
 * @property FrontBanner[] $frontBanners
 * @property News[] $news
 */
class AdminBase extends ActiveRecord
{

	public function tableName()
	{
		return 'tblpa_admin';
	}

	public function rules()
	{
		return array(
			array('name, username, address', 'required'),
			array('email', 'email'),
			array('email', 'email'),
			array('username', 'unique', 'message' => 'Username already exists!'),
			array('email', 'unique', 'message' => 'Email already exists!'),
			array('is_inactive', 'numerical', 'integerOnly' => true),
			array('name, username, phone, cell_phone, email', 'length', 'max' => 60),
			array('password', 'length', 'max' => 40),
			array('salt', 'length', 'max' => 32),
			array('new_password, confirm_password', 'required', 'on' => 'insert, changePassword'),
			array('confirm_password', 'compare', 'compareAttribute' => 'new_password', 'on' => 'insert, changePassword'),
			array('current_password', 'required', 'on' => 'changePassword'),
			array('current_password', 'authenticatePassword', 'on' => 'changePassword'),
			// The following rule is used by search().
			array('id, updated_time, name, username, password, salt, address, phone, cell_phone, email, is_inactive', 'safe', 'on' => 'search'),
		);
	}

	public function relations()
	{
		return array(
			'contactUses' => array(self::HAS_MANY, 'ContactUs', 'admin_id'),
			'contents' => array(self::HAS_MANY, 'Content', 'admin_id'),
			'frontBanners' => array(self::HAS_MANY, 'FrontBanner', 'admin_id'),
			'news' => array(self::HAS_MANY, 'News', 'admin_id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'updated_time' => 'Updated Time',
			'name' => 'Name',
			'username' => 'Username',
			'password' => 'Password',
			'salt' => 'Salt',
			'address' => 'Address',
			'phone' => 'Phone',
			'cell_phone' => 'Cell Phone',
			'email' => 'Email',
			'is_inactive' => 'Is Inactive',
		);
	}

	public function search()
	{
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('updated_time', $this->updated_time, true);
		$criteria->compare('name', $this->name, true);
		$criteria->compare('username', $this->username, true);
		$criteria->compare('password', $this->password, true);
		$criteria->compare('salt', $this->salt, true);
		$criteria->compare('address', $this->address, true);
		$criteria->compare('phone', $this->phone, true);
		$criteria->compare('cell_phone', $this->cell_phone, true);
		$criteria->compare('email', $this->email, true);
		$criteria->compare('is_inactive', $this->is_inactive);

		return new CActiveDataProvider($this, array(
				'criteria' => $criteria,
			));
	}
}