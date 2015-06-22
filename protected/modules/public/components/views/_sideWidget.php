<div class="widget w-info">
    <h4 class="w-title-left">Contact Us</h4>
    <div class="w-content">
        <ul>
            <li>
                <table id="table-none" style="width: 200px;">
                    <tr>
                        <td>Phone</td>
                        <td><?php echo CHtml::encode(CHtml::value($contactUs, 'phone')); ?></td>
                    </tr>
                    <tr>
                        <td>Fax</td>
                        <td><?php echo CHtml::encode(CHtml::value($contactUs, 'fax')); ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><?php echo CHtml::encode(CHtml::value($contactUs, 'email')); ?></td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td><?php echo CHtml::encode(CHtml::value($contactUs, 'address')); ?>, <?php echo CHtml::encode(CHtml::value($contactUs, 'post_code')); ?><br/><?php echo CHtml::encode(CHtml::value($contactUs, 'city')); ?>, <?php echo CHtml::encode(CHtml::value($contactUs, 'country')); ?></td>
                    </tr>
                </table>
            </li>
        </ul>       
    </div>
</div>
    
<!-- News Widget -->
<div class="widget w-news">
    <h4 class="w-title-left">Lastest News</h4>
    <div class="w-content">
        <ul>
            <?php
                $this->widget('zii.widgets.CListView', array(
                    'dataProvider' => $newsProvider,
                    'itemView' => '_viewNewsList',
                    'template' => '{items}{pager}',
                ));
            ?>
            
        </ul>
    </div>
</div>

<div class="widget w-info">
    <h4 class="w-title-left">Follow Us</h4>
    <div class="w-content">
       <br/>
    <div class="fb-like" data-href="<?php echo CHtml::encode(CHtml::value($facebook, 'link'));?>" data-width="100" data-layout="button" data-action="like" data-show-faces="false" data-share="false"></div>
           
    </div>
</div>

<div class="widget w-news">
    <h4 class="w-title-left">Promotions</h4>
    <div class="w-content">
        <ul>
            <?php foreach ($promotions as $promotion): ?>
            <li>
                <?php echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/promotion/' . CHtml::encode(CHtml::value($promotion, 'filename')), '', array('style' => 'width:180px; height:250px;')), Yii::app()->request->baseUrl . '/images/promotion/' . CHtml::encode(CHtml::value($promotion, 'filename')), array('title' => '')); ?>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
