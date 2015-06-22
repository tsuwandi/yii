<div id="page-head">
    <h1>Category <?php echo CHtml::encode(CHtml::value($productCategory, 'name')); ?></h1>
    <ul id="breadcrumbs">
        <li><?php echo CHtml::link('Home', array('default/index')); ?></li>
        <li><?php echo CHtml::encode(CHtml::value($productCategory, 'name')); ?></li>
    </ul>
</div>

<?php if ($productCategory->is_layout === '1') : ?>
        <div id="cat-container">

            <ul id="p-filter">
                <li><a href="#all" class="act">All <?php echo CHtml::encode(CHtml::value($productCategory, 'name')); ?></a></li>
            </ul>
            <?php
            $this->widget('zii.widgets.CListView', array(
                'dataProvider' => $productCategoryList,
                'itemView' => '_viewCategoryList',
                'template' => '{items}{pager}',
                'pager' => array('cssFile' => Yii::app()->baseUrl . '/css/style.css'),
            ));
            ?>
        </div>

    <?php else : ?>
        <div id="cat-container">
            <table width="95%" cellspacing="0" cellpadding="0">
                <thead>
                    <tr>
                        <th style="width:20%"><?php echo CHtml::encode(CHtml::value($productCategory, 'name')); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $this->widget('zii.widgets.CListView', array(
                        'dataProvider' => $productCategoryTable,
                        'itemView' => '_viewCategoryTable',
                        'template' => '{items}{pager}',
                    ));
                    ?>

                </tbody>
            </table>

        </div>

<?php endif; ?>
