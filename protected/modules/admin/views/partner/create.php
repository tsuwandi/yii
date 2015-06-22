<?php 
    $this->menu = array(
        array('label' => Yii::app()->name),
        array('label' => 'Manage Partner', 'url'=>array('admin')),
        array('label' => 'Setting'),
        array('label' => 'Profile User', 'url' => array('admin/view', 'id' => Yii::app()->user->id)),
        array('label' => 'Change Password', 'url' => array('admin/changePassword', 'id' => Yii::app()->user->id)),
        array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('default/logout'), 'visible' => !Yii::app()->user->isGuest),
    ); 
     
    $this->breadcrumbs = array(
        'Partner' => array('partner/admin'),
        'Admin',
    ); 
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>