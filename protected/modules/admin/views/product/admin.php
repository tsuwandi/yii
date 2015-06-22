<?php
    $this->menu = array(
        array('label' => Yii::app()->name),
        array('label' => 'Create Products', 'url' => array('create')),
        array('label' => 'View Products Category', 'url' => array('productCategory/admin')),
        array('label' => 'Setting'),
        array('label' => 'Profile User', 'url' => array('admin/view', 'id' => Yii::app()->user->id)),
        array('label' => 'Change Password', 'url' => array('admin/changePassword', 'id' => Yii::app()->user->id)),
        array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('default/logout'), 'visible' => !Yii::app()->user->isGuest),
    );

    $this->breadcrumbs = array(
        'Products' => array('product/create'),
        'Admin',
    );
?>

<fieldset>

    <legend>Manage Products</legend>

    <?php
        $this->widget('bootstrap.widgets.TbGridView', array(
            'id' => 'product-grid',
            'type' => TbHtml::GRID_TYPE_BORDERED,
            'dataProvider' => $dataProvider,
            'filter' => $model,
            'columns' => array(
				'name',
                array(
                    'header' => 'Image',
                    'type' => 'raw',
                    'value' => 'CHtml::image(Yii::app()->baseUrl."/images/product/".$data->filename,"",array("style"=>"width:30%; margin-left:100px;"))',
                    'htmlOptions' => array('style' => 'width:50%;')
                ),
                array(
                    'name' => 'product_category_id',
                    'filter' => CHtml::listData(ProductCategory::model()->active()->findAll(), 'id', 'name'),
                    'value' => 'CHtml::value($data, "productCategory.name")',
                ),
                array(
                    'name' => 'is_inactive',
                    'header' => 'Status',
                    'filter' => false,
                    'value' => '$data->status',
                    'htmlOptions' => array('style' => 'vertical-align:text-top;')
                ),
                array(
                    'class' => 'bootstrap.widgets.TbButtonColumn',
                    'template' => '{view},{update},{delete}',
                    'htmlOptions' => array('style' => 'text-align:left;vertical-align:text-top;')
                ),
            ),
        ));
    ?>
</fieldset>


