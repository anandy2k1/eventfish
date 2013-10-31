<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Event Fish',
    // preloading 'log' component
    'preload' => array('log'),
    'defaultController' => 'site/index',
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.models.User.*',
        'application.components.*',
        'ext.giix-components.*', // giix components
        'application.modules.rights.*',        
        'application.modules.rights.components.*', // Correct paths if necessary.
        'ext.slajaxtabs.*',
        'application.helpers.*',
        'application.extensions.inx.*',
        'application.extensions.yii-mail.*', //for mail
    ),
    'modules' => array(
// uncomment the following to enable the Gii tool
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => 'admin123',
            'generatorPaths' => array(
                'ext.giix-core', // giix generators
            ),
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1'),
        ),
        'rights' => array('install' => true), // Enables the installer.
        'admin',
    ),
    // application components
    'components' => array(
        'admin' => array(
            'allowAutoLogin' => true,
            'autoUpdateFlash' => true,
            'class' => 'AdminRWebUser',
            'loginUrl' => array('/admin/login'),
            'fullname' => '',
        ),
        'phpThumb' => array(
            'class' => 'ext.EPhpThumb.EPhpThumb',
            'options' => array()
        ),
        'user' => array(
            'allowAutoLogin' => true, // enable cookie-based authentication
        ),
        // uncomment the following to enable URLs in path-format
        'urlManager' => array(
            'urlFormat' => 'path',
            'rules' => array(
                // backend routing rules //
                'admin' => 'admin/index/index',
                // frontend routing rules //
                'home' => 'site/index',
                'page/<id:\w+>' => 'site/cms',
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ),
        // YiiMail Settings //
        'mail' => array(
            'class' => 'application.extensions.yii-mail.YiiMail',
            //'transportType' => 'php',
            'transportType' => 'smtp', /// case sensitive!            
            'transportOptions' => array(
                'host' => 'smtp.gmail.com',
                'username' => 'prakashp@bitwiseonline.com',
                'password' => 'pjpjpj2013',
                'port' => '26',
            //'encryption'=>'ssl',
            ),
            'viewPath' => 'application.views.mail',
            'logging' => true,
            'dryRun' => false,
        ),
        // uncomment the following to use a MySQL database
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=eventfish_1',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => 'mysql',
            'charset' => 'utf8',
        ),
        'errorHandler' => array(
// use 'site/error' action to display errors
            'errorAction' => 'site/error',
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
    'params' => require(dirname(__FILE__) . '/params.php'),
);