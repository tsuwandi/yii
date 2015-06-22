<?php
    $this->menu = array(
        array('label' => Yii::app()->name),
        array('label' => 'Create News', 'url' => array('create')),
        array('label' => 'Setting'),
        array('label' => 'Profile User', 'url' => array('admin/view', 'id' => Yii::app()->user->id)),
        array('label' => 'Change Password', 'url' => array('admin/changePassword', 'id' => Yii::app()->user->id)),
        array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('default/logout'), 'visible' => !Yii::app()->user->isGuest),
    );

    $this->breadcrumbs = array(
        'News' => array('news/create'),
        'Admin',
    );
?>
<fieldset>

    <legend>Manage News</legend>

    <?php
        $this->widget('bootstrap.widgets.TbGridView', array(
            'id' => 'news-grid',
            'type' => TbHtml::GRID_TYPE_BORDERED,
            'dataProvider' => $model->search(),
            'filter' => $model,
            'columns' => array(
                array(
                    'name' => 'id',
                    'header' => 'No.',
                    'value' => '$data->id',
                    'htmlOptions' => array('style' => 'width:10%;')
                ),
                array(
                    'name' => 'date',
                    'value' => '$data->date',
                ),
                array(
                    'name' => 'title',
                    'value' => '$data->title',
                ),
                array(
                    'name' => 'is_inactive',
                    'header' => 'Status',
                    'filter' => false,
                    'value' => '$data->status',
                ),
                array(
                    'class' => 'bootstrap.widgets.TbButtonColumn',
                    'template' => '{view},{update},{delete}',
                ),
            ),
        ));
    ?>

</fieldset>