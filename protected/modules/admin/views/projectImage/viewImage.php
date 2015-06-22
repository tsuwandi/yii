<?php
$this->menu = array(
	array('label' => Yii::app()->name),
	array('label' => 'Manage Project', 'url' => array('project/admin')),
	array('label' => 'View Project', 'url' => array('project/view', 'id' => $project->id)),
	array('label' => 'Upload Project Image', 'url' => array('projectImage/create', 'projectId' => $project->id)),
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
<?php echo CHtml::beginForm(); ?>

<?php foreach ($projectImages as $i => $projectImage) : ?>
    <div style="display: inline-block; width: 33%; padding-right: 0px;">

        <?php echo CHtml::image(Yii::app()->request->baseUrl . '/images/project/projectImage/' . CHtml::value($projectImage, 'filename')); ?><br/><br/>

        <?php echo CHtml::activeDropDownList($projectImage, "[$i]is_inactive", array(ActiveRecord::ACTIVE => 'Active', ActiveRecord::INACTIVE => 'Inactive')); ?>
    </div>
<?php endforeach; ?>
<div style="display: table-row;">
    <?php echo CHtml::submitButton('Submit', array('name' => 'Submit', 'confirm' => 'Are you sure you want to save?')); ?>
</div>
<?php echo CHtml::endForm(); ?>