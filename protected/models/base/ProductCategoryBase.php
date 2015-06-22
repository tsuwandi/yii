<?php

/**
 * @property integer $id
 * @property string $name
 * @property integer $is_layout
 * @property string $updated_time
 * @property integer $admin_id
 * @property integer $is_inactive
 *
 * @property Product[] $products
 * @property Admin $admin
 */
class ProductCategoryBase extends ActiveRecord
{
	public function tableName()
	{
		return 'tblpa_product_category';
	}

	public function rules()
	{
		return array(
			array('name, admin_id, is_layout, is_inactive', 'required'),
			array('is_layout, admin_id, is_inactive', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>60),
			// The following rule is used by search().
			array('id, name, updated_time, admin_id, is_layout, is_inactive', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
			'products' => array(self::HAS_MANY, 'Product', 'product_category_id'),
			'admin' => array(self::BELONGS_TO, 'Admin', 'admin_id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
                        'is_layout' => 'Is Layout',
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
                $criteria->compare('is_layout', $this->is_layout);
		$criteria->compare('updated_time', $this->updated_time, true);
		$criteria->compare('admin_id', $this->admin_id);
		$criteria->compare('is_inactive', $this->is_inactive);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}