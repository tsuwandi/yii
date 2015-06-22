<?php
    $this->menu = array(
        array('label' => Yii::app()->name),
        array('label' => 'Manage Content', 'url' => array('admin')),
        array('label' => 'Update Content', 'url' => array('update', 'id' => $model->id)),
		array('label' => 'Upload Image', 'url' => array('uploadImage', 'id' => $model->id), 'visible' => ($model->file_extension !== '') ? true : false),
        array('label' => 'Setting'),
        array('label' => 'Profile User', 'url' => array('admin/view', 'id' => Yii::app()->user->id)),
        array('label' => 'Change Password', 'url' => array('admin/changePassword', 'id' => Yii::app()->user->id)),
        array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('default/logout'), 'visible' => !Yii::app()->user->isGuest),
    );

    $this->breadcrumbs = array(
        'Content' => array('content/admin'),
        'View',
    );
?>

<fieldset>
 
    <legend>View Content # <?php echo $model->content_name; ?></legend>

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
                'value'=>$model->content_name,
            ),
            array(
                'label'=>'Description',
                'value'=>$model->description,
                'type'=>'raw',
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
	
	<?php if ($model->file_extension !== ''): ?>
		 <?php echo TbHtml::thumbnails(array(array('image' => Yii::app()->baseUrl. '/images/content/' . $model->filename, 'url' => '#')), array('style' => 'margin-left:150px;')); ?>
	<?php endif; ?>     

</fieldset>