<?php

/**
 * @property integer $id
 * @property string $name
 * @property string $city
 * @property string $post_code
 * @property string $country
 * @property string $address
 * @property string $phone
 * @property string $fax
 * @property string $email
 * @property string $rei
 * @property string $updated_time
 * @property integer $admin_id
 * @property integer $is_inactive
 *
 * @property Admin $admin
 */
class ContactUsBase extends ActiveRecord
{
	public function tableName()
	{
		return 'tblpa_contact_us';
	}

	public function rules()
	{
		return array(
			array('name, city, post_code, country, address, phone, fax, email, rei, admin_id', 'required'),
			array('email', 'email'),
			array('admin_id, is_inactive', 'numerical', 'integerOnly'=>true),
			array('name, city, post_code, country, phone, fax, email, rei', 'length', 'max'=>60),
			// The following rule is used by search().
			array('id, name, city, post_code, country, address, phone, fax, email, rei, updated_time, admin_id, is_inactive', 'safe', 'on'=>'search'),
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
			'city' => 'City',
			'post_code' => 'Post Code',
			'country' => 'Country',
			'address' => 'Address',
			'phone' => 'Phone',
			'fax' => 'Fax',
			'email' => 'Email',
			'rei' => 'Rei',
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
		$criteria->compare('city', $this->city, true);
		$criteria->compare('post_code', $this->post_code, true);
		$criteria->compare('country', $this->country, true);
		$criteria->compare('address', $this->address, true);
		$criteria->compare('phone', $this->phone, true);
		$criteria->compare('fax', $this->fax, true);
		$criteria->compare('email', $this->email, true);
		$criteria->compare('rei', $this->rei, true);
		$criteria->compare('updated_time', $this->updated_time, true);
		$criteria->compare('admin_id', $this->admin_id);
		$criteria->compare('is_inactive', $this->is_inactive);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}