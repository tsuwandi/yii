<?php 
    $this->menu = array(
        array('label' => Yii::app()->name),
        array('label' => 'Create News', 'url'=>array('create')),
        array('label' => 'Manage News', 'url'=>array('admin')),
        array('label' => 'Update News', 'url'=>array('update', 'id' => $model->id)),
        array('label' => 'Upload Image', 'url'=>array('uploadImage', 'id' => $model->id)),
        array('label' => 'Setting'),
        array('label' => 'Profile User', 'url' => array('admin/view', 'id' => Yii::app()->user->id)),
        array('label' => 'Change Password', 'url' => array('admin/changePassword', 'id' => Yii::app()->user->id)),
        array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('default/logout'), 'visible' => !Yii::app()->user->isGuest),
    ); 
     
    $this->breadcrumbs = array(
        'News' => array('news/admin'),
        'View',
    ); 
?>
<fieldset>
 
    <legend>View News # <?php echo $model->id; ?></legend>

    <?php $this->widget('bootstrap.widgets.TbDetailView',array(
        'type' => TbHtml::GRID_TYPE_BORDERED,
        'data'=>$model,
        'attributes'=>array(
            array(
                'label'=>'No.',
                'value'=>$model->id,
            ),
            'date',
            array(
                'label'=>'Title',
                'value'=>$model->title,
            ),
            array(
                'label'=>'Description',
                'value'=>$model->description,
                'type'=>'raw',
            ),
            array(
                'label' => 'Image', 
                'type'=>'raw',
                'value'=>html_entity_decode(CHtml::image(Yii::app()->baseUrl. '/images/news/' . $model->filename, '', array('width'=>341,'height'=>232))),
            ),
            array(
                'label'=>'Last Edited',
                'value'=>Yii::app()->dateFormatter->formatDateTime($model->updated_time, 'full', null),
            ),
            array(
                'label'=>'Edited By',
                'value'=>$model->admin->name,
            ),
            array(
                'label'=>'Status',
                'value'=>$model->status,
            ),
        ),
    )); ?>

</fieldset>