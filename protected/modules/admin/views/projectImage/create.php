<?php
$this->menu = array(
	array('label' => Yii::app()->name),
	array('label' => 'Manage Project', 'url' => array('project/admin')),
	array('label' => 'Setting'),
	array('label' => 'Profile User', 'url' => array('admin/view', 'id' => Yii::app()->user->id)),
	array('label' => 'Change Password', 'url' => array('admin/changePassword', 'id' => Yii::app()->user->id)),
	array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('default/logout'), 'visible' => !Yii::app()->user->isGuest),
);

$this->breadcrumbs = array(
	'Project' => array('project/admin'),
	'Create',
);
?>

<?php echo CHtml::beginForm(array(), 'POST', array('enctype' => 'multipart/form-data')); ?>
<div class="container" style="margin-bottom: 20px;">
    <div class="span-12">
        <div class="row">
            <?php echo CHtml::label('Upload Gambar', false); ?>
            <div class="field">
                <?php
                    $this->widget('CMultiFileUpload', array(
                        'model' => $projectImage->project,
                        'attribute' => 'files',
                        'accept' => 'jpg|jpeg|png|gif',
                        'denied' => 'Only jpg, jpeg, png and gif are allowed',
                        'max' => 10,
                        'remove' => '[x]',
                        'duplicate' => 'Already Selected',
                    ));
                ?>
                <?php echo CHtml::error($projectImage->project, 'files'); ?>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>

<?php echo CHtml::submitButton('Tambah', array('name' => 'Submit', 'confirm' => 'Are you sure you want to save?')); ?>

<?php echo CHtml::endForm(); ?>
