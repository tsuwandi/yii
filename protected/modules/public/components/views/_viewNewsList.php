<li>
    <span><strong><?php echo CHtml::encode(substr(CHtml::value($data, 'date'), 8, 2)); ?></strong><?php echo CHtml::encode(substr(Yii::app()->dateFormatter->formatDateTime($data->date, 'medium', ''), 0, 3)); ?></span>
    <?php echo CHTml::link(CHtml::encode(CHtml::value($data, 'title')), array('detailNews', 'newsId' => $data->id)); ?><br/>
    <?php $admin = $data->admin(array('scopes' => 'resetScope')); ?>
    Posted By <?php echo CHtml::encode(CHtml::value($admin, 'name')); ?>
</li>
