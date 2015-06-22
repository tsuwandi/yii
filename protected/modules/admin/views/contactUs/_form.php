<?php
    /* @var $this ContactUsController */
    /* @var $model ContactUs */
    /* @var $form TbActiveForm */
?>

<fieldset>

    <legend><?php echo ucfirst($this->action->id); ?> Contact Us</legend>

    <?php
        $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
            'id' => 'contact-us-form',
            'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
            'enableAjaxValidation' => false,
        ));
    ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->textFieldControlGroup($model, 'name', array('label' => 'Name', 'span' => 3, 'maxlength' => 60)); ?>

    <?php echo $form->textAreaControlGroup($model, 'address', array('rows' => 6, 'span' => 3)); ?>

    <?php echo $form->textFieldControlGroup($model, 'city', array('span' => 3, 'maxlength' => 60)); ?>

    <?php echo $form->textFieldControlGroup($model, 'post_code', array('span' => 3, 'maxlength' => 60)); ?>

    <?php echo $form->textFieldControlGroup($model, 'country', array('span' => 3, 'maxlength' => 60)); ?>

    <?php echo $form->textFieldControlGroup($model, 'phone', array('span' => 3, 'maxlength' => 60)); ?>

    <?php echo $form->textFieldControlGroup($model, 'fax', array('span' => 3, 'maxlength' => 60)); ?>

    <?php echo $form->textFieldControlGroup($model, 'email', array('span' => 3, 'maxlength' => 60)); ?>
	
	<?php echo $form->textFieldControlGroup($model, 'rei', array('span' => 3, 'maxlength' => 60)); ?>

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