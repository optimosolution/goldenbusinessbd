<?php

return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Golden Business Bangladesh',
    //Default time zone
    'timeZone' => 'Asia/Dhaka',
    //Default source language
    'sourceLanguage' => 'en_us',
    // preloading 'log' component
    'preload' => array('log'),
    // path aliases
    'aliases' => array(
        // yiistrap configuration
        'bootstrap' => realpath(__DIR__ . '/../extensions/bootstrap'), // change this if necessary
        // yiiwheels configuration
        'yiiwheels' => realpath(__DIR__ . '/../extensions/yiiwheels'), // change if necessary
    ),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        // import paths - yiistrap configuration
        'bootstrap.helpers.TbHtml',
    ),
    'modules' => array(
        // uncomment the following to enable the Gii tool
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => 'admin',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1'),
            'generatorPaths' => array(
                'bootstrap.gii',
            ),
        ),
    ),
    'behaviors' => array(
        'runEnd' => array(
            'class' => 'application.components.WebApplicationEndBehavior',
        ),
    ),
    // application components
    'components' => array(
        // yiistrap configuration
        'bootstrap' => array(
            //'class' => 'bootstrap.components.Bootstrap',
            'class' => 'bootstrap.components.TbApi',
        ),
        // yiiwheels configuration
        'yiiwheels' => array(
            'class' => 'yiiwheels.YiiWheels',
        ),
        'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin' => true,
        ),
        'browser' => array(
            'class' => 'application.extensions.browser.CBrowserComponent',
        ),
        'session' => array(
            'class' => 'CDbHttpSession',
            'connectionID' => 'db',
            'sessionName' => 'OPTIMO',
            'autoCreateSessionTable' => false,
            'sessionTableName' => 'os_yiisession',
            'cookieMode' => 'only',
            'timeout' => 3600,
        ),
        // uncomment the following to use a MySQL database
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=goldenbusinessbd',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
            'tablePrefix' => 'os_'
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
    'params' => array(
        // this is used in contact page
        'adminEmail' => 'info@goldenbusinessbd.com',
    ),
);