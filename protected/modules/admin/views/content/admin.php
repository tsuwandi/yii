<?php
    $this->menu = array(
        array('label' => Yii::app()->name),
        array('label' => 'Profile User', 'url' => array('admin/view', 'id' => Yii::app()->user->id), 'active' => 'true'),
        array('label' => 'Change Password', 'url' => array('admin/changePassword', 'id' => Yii::app()->user->id)),
        array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('default/logout'), 'visible' => !Yii::app()->user->isGuest),
    );

    $this->breadcrumbs = array(
        'Content' => array('content/admin'),
        'Admin',
    );
?>

<fieldset>
 
<legend>Manage Content</legend>

    <?php $this->widget('bootstrap.widgets.TbGridView',array(
        'id'=>'content-grid',
        'type' => TbHtml::GRID_TYPE_BORDERED,
        'dataProvider'=>$model->search(),
        'filter'=>$model,
        'columns'=>array(
            array(
                'name'=>'id',
                'header' => 'No.',
                'filter'=>false,
                'value'=>'$data->id',
                'htmlOptions' => array('style' => 'width:10%;')
            ),
            array(
                'name'=>'content_name',
                'header' => 'Name',
                'value'=>'$data->content_name',
            ),
            array(
                'class'=>'bootstrap.widgets.TbButtonColumn',
                'template'=>'{view},{update}'
            ),
        ),
    )); ?>

</fieldset>