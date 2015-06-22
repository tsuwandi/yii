<div id="container">
    <?php
        $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
            'id' => 'admin-form',
            'enableAjaxValidation' => false,
        ));
    ?>
    <fieldset>

		
        <legend>Gypsum</legend>

        <div style="clear: both"></div>

        <?php echo $form->textFieldControlGroup($admin, 'username', array('span' => 3, 'maxlength' => 60)); ?>

        <?php echo $form->passwordFieldControlGroup($admin, 'password', array('span' => 3, 'maxlength' => 60)); ?>

        <?php echo $form->checkBoxListControlGroup($admin, 'rememberMe', array('Remember Me',)); ?>

        <?php
            echo TbHtml::submitButton('Login', array(
                'color' => TbHtml::BUTTON_COLOR_PRIMARY,
                'size' => TbHtml::BUTTON_SIZE_DEFAULT,
            ));
        ?>

        <?php $this->endWidget(); ?>

    </fieldset>
</div>