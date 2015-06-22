<?php $productCategory = $data->productCategory(array('scopes' => 'resetScope')); ?>
<dl class="col-50 p-item">
    <dt><?php echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/product/' . CHtml::encode(CHtml::value($data, 'filename')), '', array('style' => 'width:100px; height:120px')), array('product', 'id' => $data->id)); ?></dt>
    <dd>
		<?php echo CHTml::link(CHtml::encode(CHtml::value($data, 'name')), array('product', 'id' => $data->id)); ?>
        <span><?php echo CHtml::encode(CHtml::value($productCategory, 'name'));?></span>
    </dd>
</dl>