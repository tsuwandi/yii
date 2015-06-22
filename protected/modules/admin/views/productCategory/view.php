<?php
    $this->menu = array(
        array('label' => Yii::app()->name),
        array('label' => 'Create Product Category', 'url' => array('create')),
        array('label' => 'Manage Product Category', 'url' => array('admin')),
        array('label' => 'Update Product Category', 'url' => array('update', 'id' => $model->id)),
	array('label' => 'Setting'),
        array('label' => 'Profile User', 'url' => array('admin/view', 'id' => Yii::app()->user->id)),
        array('label' => 'Change Password', 'url' => array('admin/changePassword', 'id' => Yii::app()->user->id)),
        array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('default/logout'), 'visible' => !Yii::app()->user->isGuest),
    );

    $this->breadcrumbs = array(
        'Product Category' => array('productCategory/admin'),
        'View',
    );
?>

<fieldset>
 
    <legend>View Product Category # <?php echo $model->id; ?></legend>

    <?php $this->widget('bootstrap.widgets.TbDetailView',array(
        'type' => TbHtml::GRID_TYPE_BORDERED,
        'data'=>$model,
        'attributes'=>array(
            array(
                'label'=>'No.',
                'value'=>$model->id,
            ),
            array(
                'label'=>'Name',
                'value'=>$model->name,
            ),
            array(
                'label'=>'Last Edited',
                'value'=>Yii::app()->dateFormatter->formatDateTime($model->updated_time, 'full', null),
            ),
            array(
                'label'=>'Edited By',
                'value'=>$model->admin->name,
            ),
        ),
    )); ?>
</fieldset>