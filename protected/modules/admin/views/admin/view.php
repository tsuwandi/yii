<?php
    $this->menu = array(
        array('label' => Yii::app()->name),
        array('label' => 'Create Admin', 'url' => array('create')),
        array('label' => 'Manage Admin', 'url' => array('admin')),
        array('label' => 'Update Admin', 'url' => array('update', 'id' => Yii::app()->user->id)),
        array('label' => 'Setting'),
        array('label' => 'Profile User', 'url' => array('admin/view', 'id' => Yii::app()->user->id)),
        array('label' => 'Change Password', 'url' => array('admin/changePassword', 'id' => Yii::app()->user->id)),
        array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('default/logout'), 'visible' => !Yii::app()->user->isGuest),
    );

    $this->breadcrumbs = array(
        'Admin' => array('admin/admin'),
        'View',
    );
?>

<fieldset>

    <legend>View Admin # <?php echo $model->id; ?></legend>

    <?php
        $this->widget('bootstrap.widgets.TbDetailView', array(
            'type' => TbHtml::GRID_TYPE_BORDERED,
            'data' => $model,
            'attributes' => array(
                array(
                    'label' => 'No.',
                    'value' => $model->id,
                ),
                'name',
                'username',
                'address',
                'phone',
                'cell_phone',
                'email',
                array(
                    'label' => 'Last Edited',
                    'value' => Yii::app()->dateFormatter->formatDateTime($model->updated_time, 'full', null),
                ),
                array(
                    'label' => 'Status',
                    'value' => $model->status,
                ),
            ),
        ));
    ?>

</fieldset>