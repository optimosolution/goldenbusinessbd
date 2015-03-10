<?php

return CMap::mergeArray(
                require(dirname(__FILE__) . '/main.php'), array(
            // Put front-end settings there.
            'components' => array(
            // uncomment the following to enable URLs in path-format
            /* 'urlManager' => array(
              'urlFormat' => 'path',
              'showScriptName' => false,
              'urlSuffix' => '.html',
              'rules' => array(
              '<action>' => 'site/<action>',
              '<controller:\w+>/<id:\d+>' => '<controller>/view',
              '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
              '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
              ),
              ), */
            ),
            'theme' => 'default',
                )
);