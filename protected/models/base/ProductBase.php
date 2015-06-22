<?php

    /**
     * @property integer $id
     * @property string $file_extension
     * @property string $name
     * @property string $description
     * @property string $further_description
     * @property integer $rate
     * @property string $updated_time
     * @property integer $admin_id
     * @property integer $product_category_id
     * @property integer $is_inactive
     *
     * @property Admin $admin
     * @property ProductCategory $productCategory
     */
    class ProductBase extends ActiveRecord
    {

        public function tableName()
        {
            return 'tblpa_product';
        }

        public function rules()
        {
            return array(
                array('file_extension, name, description, further_description, admin_id, product_category_id, is_inactive', 'required'),
                array('file', 'file', 'types' => 'jpg, gif, png', 'maxSize' => 1024 * 1024 * 10, 'allowEmpty' => true,
                    'wrongType' => 'Please upload only images in the format jpg, gif, png', 'on' => 'insert, update',
                    'tooLarge' => 'The file was larger than 10MB. Please upload a smaller file.', 'on' => 'insert, update'),
                array('rate, admin_id, product_category_id, is_inactive', 'numerical', 'integerOnly' => true),
                array('file_extension', 'length', 'max' => 20),
                array('name', 'length', 'max' => 60),
                // The following rule is used by search().
                array('id, file_extension, name, description, further_description, rate, updated_time, admin_id, product_category_id, is_inactive', 'safe', 'on' => 'search'),
            );
        }

        public function relations()
        {
            return array(
                'admin' => array(self::BELONGS_TO, 'Admin', 'admin_id'),
                'productCategory' => array(self::BELONGS_TO, 'ProductCategory', 'product_category_id'),
            );
        }

        public function attributeLabels()
        {
            return array(
                'id' => 'ID',
                'file_extension' => 'File Extension',
                'name' => 'Name',
                'description' => 'Description',
                'further_description' => 'Further Description',
                'rate' => 'Rate',
                'updated_time' => 'Updated Time',
                'admin_id' => 'Admin',
                'product_category_id' => 'Product Category',
                'is_inactive' => 'Is Inactive',
            );
        }

        public function search()
        {
            $criteria = new CDbCriteria;

            $criteria->compare('id', $this->id);
            $criteria->compare('file_extension', $this->file_extension, true);
            $criteria->compare('name', $this->name, true);
            $criteria->compare('description', $this->description, true);
            $criteria->compare('further_description', $this->further_description, true);
            $criteria->compare('rate', $this->rate);
            $criteria->compare('updated_time', $this->updated_time, true);
            $criteria->compare('admin_id', $this->admin_id);
            $criteria->compare('product_category_id', $this->product_category_id);
            $criteria->compare('is_inactive', $this->is_inactive);

            return new CActiveDataProvider($this, array(
                'criteria' => $criteria,
            ));
        }

    }
    