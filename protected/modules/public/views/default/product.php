<?php $productCategory = $product->productCategory(array('scopes' => 'resetScope')); ?>
<div id="page-head">
    <h1><?php echo CHtml::encode(CHtml::value($product, 'name')); ?></h1>
    <ul id="breadcrumbs">
        <li><?php echo CHtml::link('Home', array('default/index')); ?></li>
        <li><?php echo CHtml::link(CHtml::value($productCategory, 'name'), array('default/category', 'id' => $productCategory->id)); ?></li>
        <li><?php echo CHtml::encode(CHtml::value($product, 'name')); ?></li>
    </ul>
</div>
<?php if($productCategory->is_layout === '1') : ?>
<div class="full-page-text">

    <p><?php echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/product/' . CHtml::encode(CHtml::value($product, 'filename')), '', array('class' => 'alignleft', 'style' => 'width:170px; height:200px;')), Yii::app()->request->baseUrl . '/images/product/' . CHtml::encode(CHtml::value($product, 'filename')), array('title' => '')); ?>
       <?php echo CHtml::value($product, 'description'); ?></p>
    <p><?php echo CHtml::value($product, 'further_description'); ?></p>
</div>

<?php else : ?>

<div class="full-page-text">
    <p><?php echo CHtml::value($product, 'description'); ?></p>
    <p><?php echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/product/' . CHtml::encode(CHtml::value($product, 'filename')), '', array('class' => 'aligncenter', 'style' => 'width:400px; height:200px;')), Yii::app()->request->baseUrl . '/images/product/' . CHtml::encode(CHtml::value($product, 'filename')), array('title' => '')); ?></p>
    <p><?php echo CHtml::value($product, 'further_description'); ?></p>
</div>
<?php endif; ?>

