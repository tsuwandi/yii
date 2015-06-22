<div id="page-head">
    <h1><?php echo CHtml::encode(CHtml::value($contentAboutUs, 'content_name')); ?></h1>
    <ul id="breadcrumbs">
        <li><?php echo CHtml::link('Home', array('default/index')); ?></li>
        <li><?php echo CHtml::encode(CHtml::value($contentAboutUs, 'content_name')); ?></li>
    </ul>
</div>
<div class="full-page-text">
    <p><?php echo CHtml::value($contentAboutUs, 'description'); ?></p>

    <h3><?php echo CHtml::encode(CHtml::value($contentVision, 'content_name')); ?></h3>
    <p><?php echo CHtml::value($contentVision, 'description'); ?></p>
    
    <h3><?php echo CHtml::encode(CHtml::value($contentMission, 'content_name')); ?></h3>
    <p><?php echo CHtml::value($contentMission, 'description'); ?></p>
  
</div>