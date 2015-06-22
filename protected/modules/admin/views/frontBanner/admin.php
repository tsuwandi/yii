<?php
    $this->menu = array(
        array('label' => Yii::app()->name),
        array('label' => 'Create Front Banner', 'url' => array('create')),
        array('label' => 'Setting'),
        array('label' => 'Profile User', 'url' => array('admin/view', 'id' => Yii::app()->user->id)),
        array('label' => 'Change Password', 'url' => array('admin/changePassword', 'id' => Yii::app()->user->id)),
        array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('default/logout'), 'visible' => !Yii::app()->user->isGuest),
    );

    $this->breadcrumbs = array(
        'Front Banner' => array('frontBanner/create'),
        'Admin',
    );
?>

<fieldset>

    <legend>Manage Banner</legend>

    <?php
        $this->widget('bootstrap.widgets.TbGridView', array(
            'id' => 'banner-grid',
            'type' => TbHtml::GRID_TYPE_BORDERED,
            'dataProvider' => $model->search(),
            'columns' => array(
                array(
                    'header' => 'Image',
                    'type' => 'raw',
                    'value' => 'CHtml::image(Yii::app()->baseUrl."/images/frontBanner/".$data->filename,"",array("style"=>"width:50%; margin-left:100px;"))',
                    'htmlOptions' => array('style' => 'width:50%;')
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


