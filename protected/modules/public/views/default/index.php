<div id="homepage-post">
    <h1 class="p-title"><?php echo CHtml::encode(CHtml::value($content, 'content_name')); ?></h1>
    <div class="p-content">
        <?php echo CHtml::value($content, 'description'); ?>
    </div>
</div><br/>

<!-- Nivo Slider -->
<div id="slider-container">
    <div id="big-slider"><!-- Add Slides Here -->
        <?php foreach ($banner as $banners): ?>
                <?php echo CHtml::image(Yii::app()->request->baseUrl . '/images/frontBanner/' . CHtml::encode(CHtml::value($banners, 'filename')), '', array('style' => 'width:620px; height:365px;', 'title' => '&nbsp;')); ?>
            <?php endforeach; ?>

    </div>
</div>

<div class="widget col-66">
    <h3 class="w-title home"><?php echo CHtml::value($productContent, 'content_name'); ?></h3>
    <span class="pad15"><?php echo CHtml::value($productContent, 'description'); ?></span>
    <div class="w-content pad15">
        <?php
            $this->widget('zii.widgets.CListView', array(
                'dataProvider' => $productList,
                'itemView' => '_viewProductList',
                'template' => '{items}{pager}',
                'pager' => array('cssFile' => Yii::app()->baseUrl . '/css/style.css', 'header' => ''),
            ));
        ?>
    </div>
</div>

<div class="widget col-33 c-last">
    <h3 class="w-title home">Featured Partners</h3>
    <div class="w-content">
        <ul style="list-style: none;">
            <?php foreach ($partners as $partner): ?>
                <li><?php echo CHtml::image(Yii::app()->request->baseUrl . '/images/partner/' . CHtml::encode(CHtml::value($partner, 'filename')), '', array('class' => 'alignleft', 'style' => 'width:160px;')); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>



