<?php
$this->menu = array(
	array('label' => Yii::app()->name),
	array('label' => 'Manage Partner', 'url' => array('admin')),
	array('label' => 'Create Partner', 'url' => array('create')),
	array('label' => 'Update Partner', 'url' => array('update', 'id'=>$model->id)),
	array('label' => 'Setting'),
	array('label' => 'Profile User', 'url' => array('admin/view', 'id' => Yii::app()->user->id)),
	array('label' => 'Change Password', 'url' => array('admin/changePassword', 'id' => Yii::app()->user->id)),
	array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('default/logout'), 'visible' => !Yii::app()->user->isGuest),
);

$this->breadcrumbs = array(
	'Partner' => array('partner/admin'),
	'View',
);
?>
<fieldset>

    <legend>View Promotion #<?php echo $model->id; ?></legend>

	<?php $this->widget('bootstrap.widgets.TbDetailView',array(
        'type' => TbHtml::GRID_TYPE_BORDERED,
		'data' => $model,
		'attributes' => array(
			array(
				'label' => 'No.',
				'value' => $model->id,
			),
			array(
				'label' => 'Image',
				'type' => 'raw',
				'value' => html_entity_decode(CHtml::image(Yii::app()->baseUrl . '/images/partner/' . $model->filename, '', array('width' => 341, 'height' => 232))),
			),
			array(
                'label'=>'Last Edited',
                'value'=>Yii::app()->dateFormatter->formatDateTime($model->updated_time, 'full', null),
            ),
            array(
                'label'=>'Edited By',
                'value'=>$model->admin->name,
            ),
		),
	));
	?>

</fieldset>