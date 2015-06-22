<?php 
    $this->menu = array(
        array('label' => Yii::app()->name),
        array('label' => 'Create News', 'url'=>array('create')),
        array('label' => 'Manage News', 'url'=>array('admin')),
        array('label' => 'View News', 'url'=>array('view', 'id' => $model->id)),
        array('label' => 'Update News', 'url'=>array('update', 'id' => $model->id)),
        array('label' => 'Setting'),
        array('label' => 'Profile User', 'url' => array('admin/view', 'id' => Yii::app()->user->id)),
        array('label' => 'Change Password', 'url' => array('admin/changePassword', 'id' => Yii::app()->user->id)),
        array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('default/logout'), 'visible' => !Yii::app()->user->isGuest),
    ); 
     
    $this->breadcrumbs = array(
        'News' => array('news/admin'),
        'Upload Image',
    ); 
?>

<fieldset>
 
    <legend><?php echo ucfirst($this->action->id); ?> News</legend>

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'banner-form',
        'enableAjaxValidation'=>false,
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
        'htmlOptions'=>array('enctype'=>'multipart/form-data'),
    )); ?>

    <?php echo $form->errorSummary($model); ?>

        <?php echo $form->fileFieldControlGroup($model, 'file'); ?>

        <?php if (!$model->isNewRecord):?>
             <?php echo TbHtml::thumbnails(array(array('image' => Yii::app()->baseUrl. '/images/news/' . $model->filename, 'url' => '#')), array('style' => 'margin-left:150px;')); ?>
        <?php endif; ?>
    
        <div class="form-actions">
            <?php echo TbHtml::submitButton('Update Image',array(
                'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
                'size'=>TbHtml::BUTTON_SIZE_SMALL,
            )); ?>
        </div>

    <?php $this->endWidget(); ?>
</fieldset>