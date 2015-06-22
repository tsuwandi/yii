<?php 
    $this->menu = array(
        array('label' => Yii::app()->name),
        array('label' => 'Create Products', 'url'=>array('admin')),
        array('label' => 'Manage Products', 'url'=>array('admin')),
        array('label' => 'Update Products', 'url'=>array('update', 'id' => $model->id)),
        array('label' => 'View Front Banner', 'url'=>array('view', 'id' => $model->id)),
        array('label' => 'Setting'),
        array('label' => 'Profile User', 'url' => array('admin/view', 'id' => Yii::app()->user->id)),
        array('label' => 'Change Password', 'url' => array('admin/changePassword', 'id' => Yii::app()->user->id)),
        array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('default/logout'), 'visible' => !Yii::app()->user->isGuest),
    ); 
     
    $this->breadcrumbs = array(
        'Products' => array('product/admin'),
        'Upload Image',
    ); 
?>

<fieldset>
 
    <legend><?php echo ucfirst($this->action->id); ?> Products</legend>

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'banner-form',
        'enableAjaxValidation'=>false,
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
        'htmlOptions'=>array('enctype'=>'multipart/form-data'),
    )); ?>

    <?php echo $form->errorSummary($model); ?>

        <?php echo $form->fileFieldControlGroup($model, 'file'); ?>

        <?php if (!$model->isNewRecord):?>
             <?php echo TbHtml::thumbnails(array(array('image' => Yii::app()->baseUrl. '/images/product/' . $model->filename, 'url' => '#')), array('style' => 'margin-left:150px;')); ?>
        <?php endif; ?>

        <?php if ($model->isNewRecord):?>
            <?php echo $form->dropDownListControlGroup($model, 'is_inactive', array(ActiveRecord::ACTIVE => ActiveRecord::ACTIVE_LITERAL, ActiveRecord::INACTIVE => ActiveRecord::INACTIVE_LITERAL)); ?>
        <?php endif; ?>
    
        <div class="form-actions">
            <?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array(
                'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
                'size'=>TbHtml::BUTTON_SIZE_SMALL,
            )); ?>
        </div>

    <?php $this->endWidget(); ?>
</fieldset>