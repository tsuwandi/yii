<?php

$this->menu = array(
	array('label' => Yii::app()->name),
	array('label' => 'Manage Project', 'url' => array('admin')),
	array('label' => 'Upload Image', 'url' => array('uploadImage', 'id' => $model->id)),
	array('label' => 'View project', 'url' => array('view', 'id' => $model->id)),
	array('label' => 'Setting'),
	array('label' => 'Profile User', 'url' => array('admin/view', 'id' => Yii::app()->user->id)),
	array('label' => 'Change Password', 'url' => array('admin/changePassword', 'id' => Yii::app()->user->id)),
	array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('default/logout'), 'visible' => !Yii::app()->user->isGuest),
);

$this->breadcrumbs = array(
	'Project' => array('project/admin'),
	'Update',
);
?>

<fieldset>
 
    <legend><?php echo ucfirst($this->action->id); ?> Project</legend>

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'banner-form',
        'enableAjaxValidation'=>false,
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
        'htmlOptions'=>array('enctype'=>'multipart/form-data'),
    )); ?>

    <?php echo $form->errorSummary($model); ?>

        <?php echo $form->fileFieldControlGroup($model, 'file'); ?>

        <?php if (!$model->isNewRecord):?>
             <?php echo TbHtml::thumbnails(array(array('image' => Yii::app()->baseUrl. '/images/project/' . $model->filename, 'url' => '#')), array('style' => 'margin-left:150px;')); ?>
        <?php endif; ?>
    
        <div class="form-actions">
            <?php echo TbHtml::submitButton('Update Image',array(
                'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
                'size'=>TbHtml::BUTTON_SIZE_SMALL,
            )); ?>
        </div>

    <?php $this->endWidget(); ?>
</fieldset>