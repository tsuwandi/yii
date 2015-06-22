<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />

        <!-- blueprint CSS framework -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/screen.css" media="screen, projection" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/print.css" media="print" />
        <!--[if lt IE 8]>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/ie.css" media="screen, projection" />
        <![endif]-->

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/main.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/form.css" />
        <?php Yii::app()->bootstrap->register(); ?>
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>

    <body>
        <div class="container" id="page">
            <div id="mainmenu">
                <?php if (!Yii::app()->user->isGuest) : ?>
                        <?php
                        $this->widget('bootstrap.widgets.TbNav', array(
                            'type' => TbHtml::NAV_TYPE_PILLS,
                            'items' => array(
                                array('label' => strtoupper(CHtml::encode(Yii::app()->name)), 'url' => '#', 'disabled' => true),
                                array('label' => 'Contact Us', 'url' => array('contactUs/admin'), 'active' => (Yii::app()->controller->id === 'contactUs') ? 'true' : ''),
                                array('label' => 'Content', 'url' => array('content/admin'), 'active' => (Yii::app()->controller->id === 'content') ? 'true' : ''),
                                array('label' => 'Front Banner', 'url' => array('frontBanner/admin'), 'active' => (Yii::app()->controller->id === 'frontBanner') ? 'true' : ''),
                                array('label' => 'Category', 'url' => array('productCategory/admin'), 'active' => (Yii::app()->controller->id === 'productCategory') ? 'true' : ''),
                                array('label' => 'Product', 'url' => array('product/admin'), 'active' => (Yii::app()->controller->id === 'product') ? 'true' : ''),
                                array('label' => 'Promotion', 'url' => array('promotion/admin'), 'active' => (Yii::app()->controller->id === 'promotion') ? 'true' : ''),
                                array('label' => 'Partner', 'url' => array('partner/admin'), 'active' => (Yii::app()->controller->id === 'partner') ? 'true' : ''),
                                array('label' => 'News', 'url' => array('news/admin'), 'active' => (Yii::app()->controller->id === 'news') ? 'true' : ''),
                                array('label' => 'Social Media', 'url' => array('socialMedia/admin'), 'active' => (Yii::app()->controller->id === 'socialMedia') ? 'true' : ''),
                                array('label' => 'Admin', 'url' => array('admin/admin'), 'active' => (Yii::app()->controller->id === 'admin') ? 'true' : ''),
                                array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('default/logout'), 'visible' => !Yii::app()->user->isGuest),
                            ),
                        ));
                        ?>
                    <?php endif; ?>
            </div>
            <?php echo $content; ?>

            <div class="clear"></div>

            <div id="footer">
                Copyright &copy; <?php echo date('Y'); ?> by Gypsum.<br/>
                All Rights Reserved.<br/>
                <?php echo Yii::powered(); ?>
            </div><!-- footer -->

        </div><!-- page -->

    </body>
</html>
