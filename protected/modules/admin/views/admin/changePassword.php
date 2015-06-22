<?php
    $this->menu = array(
        array('label' => Yii::app()->name),
		array('label' => 'Update Admin', 'url' => array('update', 'id' => Yii::app()->user->id)),
        array('label' => 'Setting'),
        array('label' => 'Profile User', 'url' => array('admin/view', 'id' => Yii::app()->user->id)),
        array('label' => 'Change Password', 'url' => array('admin/changePassword', 'id' => Yii::app()->user->id)),
        array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('default/logout'), 'visible' => !Yii::app()->user->isGuest),
    );

    $this->breadcrumbs = array(
        'Admin' => array('admin/view', 'id' => Yii::app()->user->id),
        'Change Password',
    );
?>

<fieldset>
 
    <legend><?php echo ucfirst($this->action->id); ?> Admin</legend>
	
	<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'admin-form',
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
        'enableAjaxValidation'=>false,
    )); ?>
    
        <?php echo $form->passwordFieldControlGroup($model,'current_password',array('span'=>3,'maxlength'=>60)); ?>
    
        <?php echo $form->passwordFieldControlGroup($model,'new_password',array('span'=>3,'maxlength'=>40)); ?>
    
        <?php echo $form->passwordFieldControlGroup($model,'confirm_password',array('span'=>3,'maxlength'=>40)); ?>
    
        <div class="form-actions">
            <?php echo TbHtml::submitButton('Update Password', array(
                'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
                'size'=>TbHtml::BUTTON_SIZE_SMALL,
            )); ?>
        </div>

    <?php $this->endWidget(); ?>
	
</fieldset>
