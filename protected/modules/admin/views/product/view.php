<?php
    $this->menu = array(
        array('label' => Yii::app()->name),
        array('label' => 'Create Products', 'url' => array('create')),
        array('label' => 'Manage Products', 'url' => array('admin')),
        array('label' => 'Update Products', 'url' => array('update', 'id' => $model->id)),
        array('label' => 'Upload Image', 'url' => array('uploadImage', 'id' => $model->id)),
        array('label' => 'Setting'),
        array('label' => 'Profile User', 'url' => array('admin/view', 'id' => Yii::app()->user->id)),
        array('label' => 'Change Password', 'url' => array('admin/changePassword', 'id' => Yii::app()->user->id)),
        array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('default/logout'), 'visible' => !Yii::app()->user->isGuest),
    );

    $this->breadcrumbs = array(
        'Products' => array('product/admin'),
        'View',
    );
?>

<fieldset>

    <legend>View Products # <?php echo $model->id; ?> </legend>
    <?php
        $this->widget('CStarRating', array(
            'attribute' => 'rate',
            'model' => $model,
            'minRating' => 1,
            'maxRating' => 5,
            'titles' => array(
                '1' => 'Normal',
                '2' => 'Average',
                '3' => 'OK',
                '4' => 'Good',
                '5' => 'Excellent'
            ),
            'readOnly'=>true,
        ));
    ?>
    <br/>
    <br/>
    <?php
        $this->widget('bootstrap.widgets.TbDetailView', array(
            'type' => TbHtml::GRID_TYPE_BORDERED,
            'data' => $model,
            'attributes' => array(
                array(
                    'label' => 'No.',
                    'value' => $model->id,
                ),
                array(
                    'label' => 'Name',
                    'value' => $model->name,
                ),
                array(
                    'label' => 'Rate',
                    'value' => $model->rate,
                ),
                array(
                    'label' => 'Description',
                    'value' => $model->description,
                    'type' => 'raw',
                ),
                array(
                    'label' => 'Further Description',
                    'value' => $model->further_description,
                    'type' => 'raw',
                ),
                array(
                    'label' => 'Image',
                    'type' => 'raw',
                    'value' => html_entity_decode(CHtml::image(Yii::app()->baseUrl . '/images/product/' . $model->filename, '', array('style' => 'width:30%;'))),
                ),
                array(
                    'label' => 'Product Category',
                    'value' => $productCategory->name,
                    'type' => 'raw',
                ),
                array(
                    'label' => 'Status',
                    'value' => $model->status,
                ),
            ),
        ));
    ?>
</fieldset>