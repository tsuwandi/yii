<?php
    $this->menu = array(
            array('label' => Yii::app()->name),
            array('label' => 'Update Social Media', 'url' => array('update', 'id' => $model->id)),
            array('label' => 'Setting'),
            array('label' => 'Profile User', 'url' => array('admin/view', 'id' => Yii::app()->user->id)),
            array('label' => 'Change Password', 'url' => array('admin/changePassword', 'id' => Yii::app()->user->id)),
            array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('default/logout'), 'visible' => !Yii::app()->user->isGuest),
    );
    $this->breadcrumbs = array(
        'Social Media' => array('socialMedia/admin'),
        'Admin',
    );
?>

<fieldset>
 
<legend>Manage Social Media</legend>
    
    <?php $this->widget('bootstrap.widgets.TbGridView',array(
        'id'=>'social-media-grid',
         'type' => TbHtml::GRID_TYPE_BORDERED,
        'dataProvider'=>$model->search(),
        'filter'=>$model,
        'columns'=>array(
             array(
                'name'=>'name',
                'value'=>'$data->name',
            ),
            array(
                'header' => 'Status',
                'filter'=>false,
                'value'=>'$data->status',
            ),
            array(
                'class'=>'bootstrap.widgets.TbButtonColumn',
                'template'=>'{view},{update}',
            ),
        ),
    )); ?>