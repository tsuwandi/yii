<?php
/* @var $this AdminController */
/* @var $model Admin */
/* @var $form TbActiveForm */
?>

<fieldset>
 
    <legend><?php echo ucfirst($this->action->id); ?> Admin</legend>

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'admin-form',
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
        'enableAjaxValidation'=>false,
    )); ?>

    <?php echo $form->errorSummary($model); ?>

            <?php echo $form->textFieldControlGroup($model,'name',array('span'=>3,'maxlength'=>60)); ?>

            <?php if ($model->isNewRecord): ?>
    
                <?php echo $form->textFieldControlGroup($model,'username',array('span'=>3,'maxlength'=>60)); ?>

                <?php echo $form->passwordFieldControlGroup($model,'new_password',array('span'=>3,'maxlength'=>40)); ?>
    
                <?php echo $form->passwordFieldControlGroup($model,'confirm_password',array('span'=>3,'maxlength'=>40)); ?>
            <?php endif; ?>

            <?php echo $form->textAreaControlGroup($model,'address',array('rows'=>5,'span'=>4)); ?>

            <?php echo $form->textFieldControlGroup($model,'phone',array('span'=>3,'maxlength'=>60)); ?>

            <?php echo $form->textFieldControlGroup($model,'cell_phone',array('span'=>3,'maxlength'=>60)); ?>

            <?php echo $form->textFieldControlGroup($model,'email',array('span'=>3,'maxlength'=>60)); ?>

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