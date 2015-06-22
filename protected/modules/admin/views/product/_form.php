<fieldset>

    <legend><?php echo ucfirst($this->action->id); ?> Product</legend>

    <?php
        $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
            'id' => 'news-form',
            'enableAjaxValidation' => false,
            'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
            'htmlOptions' => array('enctype' => 'multipart/form-data'),
        ));
    ?>

    <?php echo $form->errorSummary($model); ?>

    <?php if ($model->isNewRecord): ?>
            <?php echo $form->fileFieldControlGroup($model, 'file'); ?>
        <?php endif; ?>

    <?php echo $form->textFieldControlGroup($model, 'name'); ?>

    <div style="margin-left: 180px">
    <?php
        $this->widget('CStarRating', array(
            'attribute' => 'rate',
            'model' => $model,
            'minRating' => 1,
            'maxRating' => 5,
            'titles' => array(
                '1' => 'Normal',
                '2' => 'Average',
                '3' => 'OK',
                '4' => 'Good',
                '5' => 'Excellent'
            ),
        ));
    ?>
    </div>
    <br/>
     <br/>
    <div style="margin-left: 180px">
        <?php $this->widget('cleditor.ECLEditor', array('model' => $model, 'attribute' => "description", 'options' => array('width' => 600, 'height' => 560))); ?><br/>
    </div>

    <div style="margin-left: 180px">
        <?php $this->widget('cleditor.ECLEditor', array('model' => $model, 'attribute' => "further_description", 'options' => array('width' => 600, 'height' => 560))); ?><br/>
    </div>

    <?php echo $form->dropDownListControlGroup($model, 'product_category_id', CHtml::listData(ProductCategory::model()->active()->findAll(), 'id', 'name'), array('empty' => '-- Choose Category --')) ?>


    <?php if ($model->isNewRecord): ?>
            <?php echo $form->dropDownListControlGroup($model, 'is_inactive', array(ActiveRecord::ACTIVE => ActiveRecord::ACTIVE_LITERAL, ActiveRecord::INACTIVE => ActiveRecord::INACTIVE_LITERAL)); ?>
        <?php endif; ?>

    <div class="form-actions">
        <?php
            echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array(
                'color' => TbHtml::BUTTON_COLOR_PRIMARY,
                'size' => TbHtml::BUTTON_SIZE_SMALL,
            ));
        ?>
    </div>

    <?php $this->endWidget(); ?>

</fieldset>