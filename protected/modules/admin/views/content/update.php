<?php
    $this->menu = array(
        array('label' => Yii::app()->name),
        array('label' => 'Manage Content', 'url' => array('admin')),
		array('label' => 'View Content', 'url' => array('view', 'id' => $model->id)),
		array('label' => 'Upload Image', 'url' => array('uploadImage', 'id' => $model->id), 'visible' => ($model->file_extension !== '') ? true : false),
        array('label' => 'Setting'),
        array('label' => 'Profile User', 'url' => array('admin/view', 'id' => Yii::app()->user->id)),
        array('label' => 'Change Password', 'url' => array('admin/changePassword', 'id' => Yii::app()->user->id)),
        array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('default/logout'), 'visible' => !Yii::app()->user->isGuest),
    );

    $this->breadcrumbs = array(
        'Content' => array('content/admin'),
        'Update',
    );
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>