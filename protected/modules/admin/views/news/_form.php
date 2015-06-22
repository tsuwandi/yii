<fieldset>
 
    <legend><?php echo ucfirst($this->action->id); ?> News & Event</legend>

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'news-form',
        'enableAjaxValidation'=>false,
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
        'htmlOptions'=>array('enctype'=>'multipart/form-data'),
    )); ?>
    
    <?php echo $form->errorSummary($model); ?>

            <div class="input-append" style="margin-left:123px"> 
                <?php echo TbHtml::label('Date', 'text'); ?>
            </div>
            <div class="input-append" style="margin-left: 25px">
                
                <?php $this->widget('yiiwheels.widgets.datepicker.WhDatePicker', array(
//                    'name' => 'date',
                    'model' => $model,
                    'attribute' => 'date',
                    'pluginOptions' => array(
                        'format' => 'yyyy-mm-dd',
                    ),
                    'htmlOptions' => array(
                        'readonly' => true,
                    ),
                )); ?>
                <span class="add-on"><icon class="icon-calendar"></icon></span>
            </div><br/><br/>

            <?php echo $form->textFieldControlGroup($model,'title',array('span'=>3,'maxlength'=>60)); ?>

            <div style="margin-left: 180px">
                <?php $this->widget('cleditor.ECLEditor', array('model' => $model, 'attribute' => "description", 'options' => array('width' => 600, 'height' => 160))); ?><br/>
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