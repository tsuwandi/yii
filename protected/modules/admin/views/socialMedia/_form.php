<?php
    /* @var $this SocialMediaController */
    /* @var $model SocialMedia */
    /* @var $form TbActiveForm */
?>

<fieldset>

    <legend><?php echo ucfirst($this->action->id); ?> Social Media</legend>

    <?php
        $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
            'id' => 'social-media-form',
            // Please note: When you enable ajax validation, make sure the corresponding
            // controller action is handling ajax validation correctly.
            // There is a call to performAjaxValidation() commented in generated controller code.
            // See class documentation of CActiveForm for details on this.
            'enableAjaxValidation' => false,
            'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
        ));
    ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->textFieldControlGroup($model, 'name', array('span' => 3, 'maxlength' => 60)); ?>

    <?php echo $form->textAreaControlGroup($model, 'link', array('span' => 3, 'rows' => 6)); ?>

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