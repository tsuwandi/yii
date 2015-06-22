<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">

        <!--[if lt IE 8]>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
        <![endif]-->

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/login/reset.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/login/styles.css" />
        <?php Yii::app()->bootstrap->register(); ?>

    </head>

    <body>
        <div>
            <?php echo $content; ?>
        </div>
    </body>
</html>