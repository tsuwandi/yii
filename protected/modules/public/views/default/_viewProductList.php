<div class="post-item">
    <?php echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/product/' . CHtml::encode(CHtml::value($data, 'filename')), '', array('style' => 'width:90px; height:90px', 'class' => 'alignleft')), array('product', 'id' => $data->id)); ?>
    <h6 class="p-title"><?php echo CHTml::link(CHtml::encode(CHtml::value($data, 'name')), array('product', 'id' => $data->id)); ?></h6>
    <span style="text-align: justify; width: 370px;"><?php $this->beginWidget('CHtmlPurifier'); ?><?php echo $this->stripChar($data->description, 120); ?> ... <?php $this->endWidget(); ?></span>
</div>