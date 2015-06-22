<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"> 
    <head> 
        <title><?php echo Yii::app()->name; ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="gypsum, aksesoris, supplier gypsum, gypsum board, supplier gypsum jakarta" />
        <meta name="description" content="PT. Kala Indah Prima Supplier Gypsum. Kami juga menyediakan berbagai macam gypsum dan aksesoris berkualitas." />
        <meta name="robots" content="index, follow" />
        <meta name="googlebot" content="all" />

        <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.ico" type="image/x-icon" />
        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/colors/primary-gray.css" />

        <!-- JavaScript -->

        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/superfish.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.nivo.slider.pack.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.prettyPhoto.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.prettySociable.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.validate.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/main.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/custom.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/selectnav.js"></script>
    </head>

    <body id=
    <?php if ($this->action->id === 'index' || $this->action->id === 'aboutUs') : ?>
            <?php echo '"home"'; ?>
        <?php elseif ($this->action->id === 'product' || $this->action->id === 'category' || $this->action->id === 'search') : ?>    
            <?php echo '"portfolio"'; ?>
        <?php elseif ($this->action->id === 'detailNews') : ?>    
            <?php echo '"page-post"'; ?>
        <?php else : ?>    
            <?php echo '"blog"'; ?>

          <?php endif; ?>
          >
        <div id="fb-root"></div>
        <script type="text/javascript">(function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>
        <div id="logo-top">
            <?php echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/img/logo.png', '', array('style' => 'height:110px;')), array('default/index')); ?>
        </div>
        <div id="page">
            <div id="navigation">
                <ul id="nav">
                    <li><?php echo CHtml::link('Home', array('default/index'), array('class' => ($this->action->id === 'index') ? 'active' : '')); ?></li>  
                    <li><?php echo CHtml::link('About Us', array('default/aboutUs'), array('class' => ($this->action->id === 'aboutUs') ? 'active' : '')); ?></li>
                    <?php foreach (ProductCategory::model()->active()->findAll() as $i => $productCategory): ?>
                            <li> 
                                <?php $products = Product::model()->active()->findAllByAttributes(array('product_category_id' => $productCategory->id)); ?>
                                <?php echo CHtml::link(CHtml::value($productCategory, 'name'), array('default/category', 'id' => $productCategory->id), array('class' => (Yii::app()->request->getParam('id') === $productCategory->id) ? 'active' : '')); ?>
                                <ul>
                                    <?php foreach ($products as $product): ?>
                                        <li><?php echo CHtml::link(CHtml::encode(CHtml::value($product, 'name')), array('default/product', 'id' => $product->id)); ?></li>
                                    <?php endforeach; ?> 
                                </ul>
                            </li>  
                        <?php endforeach; ?>
                    <li><?php echo CHtml::link('News', array('default/news'), array('class' => ($this->action->id === 'news' || $this->action->id === 'detailNews') ? 'active' : '')); ?></li>
                    <li><?php echo CHtml::link('Contact Us', array('default/contactUs'), array('class' => ($this->action->id === 'contactUs') ? 'active' : '')); ?></li>
                </ul>
            </div> 

            <?php echo $content; ?>

            <div class="clear clear-wrap"></div>

            <div id="footer">
                <div id="copyright">&copy; <?php echo date('Y'); ?> PT. Kala Indah Prima. All rights reserved.</div>
                <div class="clear"></div>
            </div>
            <script type="text/javascript">

                var _gaq = _gaq || [];
                _gaq.push(['_setAccount', 'UA-45916394-1']);
                _gaq.push(['_trackPageview']);

                (function() {
                    var ga = document.createElement('script');
                    ga.type = 'text/javascript';
                    ga.async = true;
                    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                    var s = document.getElementsByTagName('script')[0];
                    s.parentNode.insertBefore(ga, s);
                })();

            </script>
        </div>
    </body>
</html>