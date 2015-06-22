<?php
    $this->menu = array(
        array('label' => Yii::app()->name),
        array('label' => 'Create Front Banner', 'url' => array('create')),
        array('label' => 'Manage Front Banner', 'url' => array('admin')),
        array('label' => 'Upload Image', 'url' => array('uploadImage', 'id' => $model->id)),
        array('label' => 'Setting'),
        array('label' => 'Profile User', 'url' => array('admin/view', 'id' => Yii::app()->user->id)),
        array('label' => 'Change Password', 'url' => array('admin/changePassword', 'id' => Yii::app()->user->id)),
        array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('default/logout'), 'visible' => !Yii::app()->user->isGuest),
    );

    $this->breadcrumbs = array(
        'Front Banner' => array('frontBanner/admin'),
        'View',
    );
?>

<fieldset>

    <legend>View Banner # <?php echo $model->id; ?></legend>

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
                    'label' => 'Image',
                    'type' => 'raw',
                    'value' => html_entity_decode(CHtml::image(Yii::app()->baseUrl . '/images/frontBanner/' . $model->filename, '', array('width' => 341, 'height' => 232))),
                ),
                array(
                    'label' => 'Status',
                    'value' => $model->status,
                ),
            ),
        ));
    ?>
</fieldset>