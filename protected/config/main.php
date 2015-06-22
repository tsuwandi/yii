<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
    Yii::setPathOfAlias('cleditor', dirname(__FILE__) . '/../extensions/cleditor');
    return array(
        'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
        'name' => 'PT. Kala Indah Prima',
        'homeUrl' => array('default/', 'view' => 'index'),
        // preloading 'log' component
        'preload' => array('log'),
        // path aliases
        'aliases' => array(
            'bootstrap' => realpath(__DIR__ . '/../extensions/bootstrap'), // change this if necessary
            'yiiwheels' => realpath(__DIR__ . '/../extensions/yiiwheels'), // change if necessary
        ),
        // autoloading model and component classes
        'defaultController' => 'public',
        'import' => array(
            'application.models.*',
            'application.models.base.*',
            'application.models.custom.*',
            'application.components.*',
            'bootstrap.helpers.TbHtml',
        ),
        'modules' => array(
            // uncomment the following to enable the Gii tool
            'admin',
            'public',
            'gii' => array(
                'class' => 'system.gii.GiiModule',
                'password' => 'admin',
                // If removed, Gii defaults to localhost only. Edit carefully to taste.
                'ipFilters' => array('127.0.0.1', '::1'),
                'generatorPaths' => array(
                    'application.generators',
                    'bootstrap.gii'
                ),
            ),
        ),
        // application components
        'components' => array(
            'user' => array(
                // enable cookie-based authentication
                'allowAutoLogin' => true,
            ),
            'bootstrap' => array(
                'class' => 'bootstrap.components.TbApi',
            ),
            'yiiwheels' => array(
                'class' => 'yiiwheels.YiiWheels',
            ),
            // uncomment the following to enable URLs in path-format
           /* 'urlManager' => array(
                'urlFormat' => 'path',
                'showScriptName' => false,
                'rules' => array(
                    'admin' => 'admin/default/index',
                    'admin/<action:\w+>' => 'admin/default/<action>',
                    'admin/<controller:\w+>/<action:\w+>' => 'admin/<controller>/<action>',
                    '<action:\w+>' => 'public/default/<action>',
                    '<controller:\w+>/<action:\w+>' => 'public/<controller>/<action>',
                    '<controller:\w+>/<id:\d+>' => '<controller>/view',
                    '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                    '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                ),
            ), */
//            'db' => array(
//                'connectionString' => 'sqlite:' . dirname(__FILE__) . '/../data/testdrive.db',
//            ),
            // uncomment the following to use a MySQL database
            'db' => array(
                'connectionString' => 'mysql:host=localhost;dbname=kipgypxi_gypsum',
                'emulatePrepare' => true,
                'username' => 'root', //kipgypxi_37
                'password' => '', //kalaindah37
                'charset' => 'utf8',
            ),
            'errorHandler' => array(
                // use 'site/error' action to display errors
                'errorAction' => array('/public/default/'),
            ),
            'log' => array(
                'class' => 'CLogRouter',
                'routes' => array(
                    array(
                        'class' => 'CFileLogRoute',
                        'levels' => 'error, warning',
                    ),
                // uncomment the following to show log messages on web pages
                /*
                  array(
                  'class'=>'CWebLogRoute',
                  ),
                 */
                ),
            ),
        ),
        // application-level parameters that can be accessed
        // using Yii::app()->params['paramName']
        'params' => array(
            // this is used in contact page
            'adminEmail' => 'kalaindahprima37@gmail.com',
        ),
    );

    