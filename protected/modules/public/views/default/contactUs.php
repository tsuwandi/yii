<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.min.js"></script>
<div id="page-head">
    <h1>Contact Us</h1>
    <ul id="breadcrumbs">
        <li><?php echo CHtml::link('Home', array('default/index')); ?></li>
        <li><?php echo CHtml::encode('Contact Us'); ?></li>
    </ul>
</div>

<div id="cat-container">
    <!-- Start Accordion With Maps and Addresses -->
    <div id="googlemaps" class="google-map google-map-full" style="height:250px"></div>

    <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.gmap.min.js"></script>

    <script type="text/javascript">
        jQuery('#googlemaps').gMap({
            maptype: 'ROADMAP',
            scrollwheel: false,
            zoom: 13,
            markers: [
                {
                    address: '<?php echo CHtml::encode(CHtml::value($contactUs, 'address')); ?>, <?php echo CHtml::encode(CHtml::value($contactUs, 'city')); ?>, <?php echo CHtml::encode(CHtml::value($contactUs, 'country')); ?>', // Your Adress Here
                                    html: '',
                                    popup: false,
                                }

                            ],
                        });
    </script>
    <div class="accordion">

        <div class="accordionTitle">Our Locations</div>
        <div class="accordionContent">

            <p>
                <strong><?php echo CHtml::encode(CHtml::value($contactUs, 'name')); ?></strong><br />
                <?php echo CHtml::encode(CHtml::value($contactUs, 'address')); ?><br/>
                <?php echo CHtml::encode(CHtml::value($contactUs, 'city')); ?> <?php echo CHtml::encode(CHtml::value($contactUs, 'post_code')); ?>, 
                <?php echo CHtml::encode(CHtml::value($contactUs, 'country')); ?><br/>
                Telephone : <?php echo CHtml::encode(CHtml::value($contactUs, 'phone')); ?><br />
                Fax : <?php echo CHtml::encode(CHtml::value($contactUs, 'fax')); ?><br />
                E-mail : <?php echo CHtml::encode(CHtml::value($contactUs, 'email')); ?><br />
            </p>
        </div>
    </div>
</div>