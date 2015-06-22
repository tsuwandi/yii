<?php
    $this->menu = array(
        array('label' => Yii::app()->name),
        array('label' => 'Profile User', 'url' => array('admin/view', 'id' => Yii::app()->user->id), 'active' => 'true'),
        array('label' => 'Change Password', 'url' => array('admin/changePassword', 'id' => Yii::app()->user->id)),
        array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('default/logout'), 'visible' => !Yii::app()->user->isGuest),
    );

    $this->breadcrumbs = array(
        'Contact Us' => array('contactUs/admin'),
        'Admin',
    );
?>

<fieldset>

    <legend>Manage Contact Us</legend>

    <?php
        $this->widget('bootstrap.widgets.TbGridView', array(
            'id' => 'contact-us-grid',
            'type' => TbHtml::GRID_TYPE_BORDERED,
            'dataProvider' => $model->search(),
            'columns' => array(
                'name',
				'address',
                array(
                    'class' => 'bootstrap.widgets.TbButtonColumn',
                    'template' => '{view},{update}'
                ),
            ),
        ));
    ?>

</fieldset>