<?php
    $this->menu = array(
        array('label' => Yii::app()->name),
        array('label' => 'Create Products Category', 'url' => array('productCategory/create')),
        array('label' => 'Setting'),
        array('label' => 'Profile User', 'url' => array('admin/view', 'id' => Yii::app()->user->id)),
        array('label' => 'Change Password', 'url' => array('admin/changePassword', 'id' => Yii::app()->user->id)),
        array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('default/logout'), 'visible' => !Yii::app()->user->isGuest),
    );

    $this->breadcrumbs = array(
        'Products Category' => array('productCategory/admin'),
        'Admin',
    );
?>

<fieldset>

    <legend>Manage Products Category</legend>

    <?php
        $this->widget('bootstrap.widgets.TbGridView', array(
            'id' => 'product-grid',
            'type' => TbHtml::GRID_TYPE_BORDERED,
            'dataProvider' => $model->search(),
            'filter' => $model,
            'columns' => array(
                'name',
                array(
                    'name' => 'is_inactive',
                    'header' => 'Status',
                    'filter' => false,
                    'value' => '$data->status',
                    'htmlOptions' => array('style' => 'vertical-align:text-top;')
                ),
                array(
                    'class' => 'bootstrap.widgets.TbButtonColumn',
                    'template' => '{view},{update}, {delete}'
                ),
            ),
        ));
    ?>
</fieldset>


