<div id="page-head">
    <h1><?php echo CHtml::encode('News'); ?></h1>
    <ul id="breadcrumbs">
        <li><?php echo CHtml::link('Home', array('default/index')); ?></li>
        <li><?php echo CHtml::link('News', array('default/news')); ?></li>
        <li><?php echo CHtml::encode(CHtml::value($news, 'title')); ?></li>
    </ul>
</div>
<div class="full-page-text">
    <h3><?php echo CHtml::encode(CHtml::value($news, 'title')); ?></h3>
    <?php $admin = $news->admin(array('scopes' => 'resetScope')); ?>
    <p>Posted By <?php echo CHtml::encode(CHtml::value($admin, 'name')); ?>, On <?php echo Yii::app()->dateFormatter->formatDateTime($news->date, 'full', '') ?></p>
    <p><?php echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/news/' . CHtml::encode(CHtml::value($news, 'filename')), '', array('class' => 'aligncenter', 'style' => 'width:584px; height:288px;')), Yii::app()->request->baseUrl . '/images/news/' . CHtml::encode(CHtml::value($news, 'filename')), array('title' => $news->title)); ?></p>
    <p><?php echo CHtml::value($news, 'description'); ?></p>
</div>
