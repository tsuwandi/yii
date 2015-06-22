<?php
    $this->menu = array(
        array('label' => Yii::app()->name),
        array('label' => 'Manage Contact Us', 'url' => array('admin')),
        array('label' => 'Update Contact Us', 'url' => array('update', 'id' => $model->id)),
        array('label' => 'Setting'),
        array('label' => 'Profile User', 'url' => array('admin/view', 'id' => Yii::app()->user->id)),
        array('label' => 'Change Password', 'url' => array('admin/changePassword', 'id' => Yii::app()->user->id)),
        array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('default/logout'), 'visible' => !Yii::app()->user->isGuest),
    );

    $this->breadcrumbs = array(
        'Contact Us' => array('contactUs/admin'),
        'View',
    );
?>

<fieldset>

    <legend>View Contact Us # <?php echo $model->name; ?></legend>

    <?php
        $this->widget('bootstrap.widgets.TbDetailView', array(
            'type' => TbHtml::GRID_TYPE_BORDERED,
            'data' => $model,
            'attributes' => array(
                'name',
                'address',
                'city',
                'post_code',
                'country',
                'phone',
                'fax',
                'email',
				'rei',
                array(
                    'label' => 'Last Edited',
                    'value' => Yii::app()->dateFormatter->formatDateTime($model->updated_time, 'full', null),
                ),
                array(
                    'label' => 'Edited By',
                    'value' => $model->admin->name,
                ),
            ),
        ));
    ?>

</fieldset>