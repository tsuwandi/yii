<?php
$this->menu = array(
	array('label' => Yii::app()->name),
	array('label' => 'Create Project', 'url' => array('create')),
	array('label' => 'Manage Project', 'url' => array('admin')),
	array('label' => 'Update Project', 'url' => array('update', 'id' => $model->id)),
	array('label' => 'View Project Image', 'url' => array('projectImage/viewImage', 'projectId' => $model->id)),
	array('label' => 'Setting'),
	array('label' => 'Profile User', 'url' => array('admin/view', 'id' => Yii::app()->user->id)),
	array('label' => 'Change Password', 'url' => array('admin/changePassword', 'id' => Yii::app()->user->id)),
	array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('default/logout'), 'visible' => !Yii::app()->user->isGuest),
);

$this->breadcrumbs = array(
	'Project' => array('project/admin'),
	'View',
);
?>
<fieldset>

    <legend>View Project #<?php echo $model->name; ?></legend>

	<?php
        $this->widget('bootstrap.widgets.TbDetailView', array(
            'type' => TbHtml::GRID_TYPE_BORDERED,
            'data' => $model,
            'attributes' => array(
                array(
                    'label' => 'No.',
                    'value' => $model->id,
                ),
                array(
                    'label' => 'Project Name',
                    'value' => $model->name,
                ),
                array(
                    'label' => 'Description',
                    'value' => $model->description,
                    'type' => 'raw',
                ),
				array(
					'label' => 'Image', 
					'type' => 'raw',
					'value'=>html_entity_decode(CHtml::image(Yii::app()->baseUrl. '/images/project/' . $model->filename, '', array('width'=>341,'height'=>232))),
				),
                array(
                    'label' => 'Last Edited',
                    'value' => Yii::app()->dateFormatter->formatDateTime($model->updated_time, 'full', null),
                ),
                array(
                    'label' => 'Edited By',
                    'value' => $model->admin->name,
                ),
            ),
        ));
    ?>
	<div class="pad10">
		<h4>Images</h4>
		<hr/>
		<?php
			$this->widget('zii.widgets.CListView', array(
				'dataProvider' => $imagesDataProvider,
				'itemView' => '_viewImage',
				'pagerCssClass' => 'pager clear',
			));
		?>
	</div>
</fieldset>