<?php
/* @var $this ContentController */
/* @var $model Content */
/* @var $form TbActiveForm */
?>

<fieldset>

    <legend><?php echo ucfirst($this->action->id); ?> Content</legend>

	<?php
	$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		'id' => 'admin-form',
		'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
		'enableAjaxValidation' => false,
		'htmlOptions' => array('enctype' => 'multipart/form-data'),
		));
	?>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldControlGroup($model, 'content_name', array('span' => 3, 'maxlength' => 60)); ?>

    <div class="editor">
		<?php $this->widget('cleditor.ECLEditor', array('model' => $model, 'attribute' => "description", 'options' => array('width' => 650, 'height' => 300))); ?>
    </div>

	<?php if ($model->isNewRecord): ?>
		<?php echo $form->fileFieldControlGroup($model, 'file'); ?>
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