<div class="post type-post">
    <div class="p-meta">
        <div class="date"><strong><?php echo CHtml::encode(substr(CHtml::value($data, 'date'), 8, 2)); ?></strong><?php echo CHtml::encode(substr(Yii::app()->dateFormatter->formatDateTime($data->date, 'medium', ''), 0, 3)); ?></div>
        <div class="date"><strong><?php echo CHtml::encode(substr(CHtml::value($data, 'date'), 0, 4)); ?></strong></div>
    
    </div>
    <div class="aligncenter thumbnail">
        <?php echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/news/' . CHtml::encode(CHtml::value($data, 'filename')), '', array('style' => 'width:545px; height:250px')), Yii::app()->request->baseUrl . '/images/news/' . CHtml::encode(CHtml::value($data, 'filename')), array('title' => $data->title)); ?>
    </div>
    <h2 class="p-title"><?php echo CHTml::link(CHtml::encode(CHtml::value($data, 'title')), array('detailNews', 'newsId' => $data->id)); ?></h2>
    <div class="post-content">
        <p>
            <?php $this->beginWidget('CHtmlPurifier'); ?>
            <?php echo $this->stripChar($data->description, 300); ?>...
            <?php echo CHtml::link('Read More', array('detailNews', 'newsId' => $data->id)); ?>
            <?php $this->endWidget(); ?>
        </p>
    </div>
</div>