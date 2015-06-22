<fieldset>
 
    <legend><?php echo ucfirst($this->action->id); ?> Project</legend>

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'project-form',
        'enableAjaxValidation'=>false,
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
        'htmlOptions'=>array('enctype'=>'multipart/form-data'),
    )); ?>
    
    <?php echo $form->errorSummary($model); ?>

            <?php echo $form->textFieldControlGroup($model,'name',array('span'=>3,'maxlength'=>60)); ?>

            <div style="margin-left: 180px">
                <?php $this->widget('cleditor.ECLEditor', array('model' => $model, 'attribute' => "description", 'options' => array('width' => 600, 'height' => 200))); ?><br/>
            </div>

            <?php if ($model->isNewRecord):?>
                <?php echo $form->fileFieldControlGroup($model, 'file'); ?>
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