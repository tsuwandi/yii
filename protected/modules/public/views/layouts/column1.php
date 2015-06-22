<?php $this->beginContent('/layouts/main'); ?>

<div id="wrap">
    <div id="main-col">
        
        <div style="float: right; margin-top: -40px; ">

             <?php echo CHtml::beginForm(array('default/search'), 'get', array('id' => 'search')); ?>
                <?php echo CHtml::textField('searchByName', '', array('title' => 'Search by name', 'placeHolder' => 'Search here ...')); ?>
                <?php echo CHtml::submitButton(''); ?>
            <?php echo CHtml::endForm(); ?>
        </div>
        <?php echo $content; ?>
    </div>
</div>

<div id="left-col">
    <?php $this->widget('SideWidget');  ?>
</div>

<?php $this->endContent(); ?>
