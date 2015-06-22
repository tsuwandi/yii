<?php
    /* @var $this ContentController */
    /* @var $model Content */
    /* @var $form TbActiveForm */
?>

<fieldset>

    <legend><?php echo ucfirst($this->action->id); ?> Products Category</legend>

    <?php
        $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
            'id' => 'products-category-form',
            'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
            'enableAjaxValidation' => false,
            'htmlOptions' => array('enctype' => 'multipart/form-data'),
        ));
    ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->textFieldControlGroup($model, 'name', array('span' => 3, 'maxlength' => 60)); ?>
    
    <?php echo $form->dropDownListControlGroup($model, 'is_layout', array('1' => 'Image Float', '2' => 'Image Center'), array('label' => 'Pilih Layout')); ?>
           
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