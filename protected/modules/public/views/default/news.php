<div id="page-head">
    <h1><?php echo CHtml::encode('News'); ?></h1>
    <ul id="breadcrumbs">
        <li><?php echo CHtml::link('Home', array('default/index')); ?></li>
        <li><?php echo CHtml::encode('News'); ?></li>
    </ul>
</div>
<div id="cat-container">
    <?php
        $this->widget('zii.widgets.CListView', array(
            'dataProvider' => $newsProvider,
            'itemView' => '_viewNews',
            'template' => '{items}{pager}',
            'pager' => array('cssFile' => Yii::app()->baseUrl . '/css/styles.css', 'header' => ''),
        ));
    ?>
</div>
