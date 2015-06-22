<div id="page-head">
    <h1>Search</h1>
    <ul id="breadcrumbs">
        <li><?php echo CHtml::link('Home', array('default/index')); ?></li>
        <li><?php echo CHtml::encode('Search'); ?></li>
    </ul>
</div>

<div id="cat-container">

    <?php
        $this->widget('zii.widgets.CListView', array(
            'dataProvider' => $dataProvider,
            'itemView' => '_viewCategoryList',
            'template' => '{items}{pager}',
            'pager' => array('cssFile' => Yii::app()->baseUrl . '/css/style.css'),
        ));
    ?>
</div>
