<?php

return CMap::mergeArray(
                require(dirname(__FILE__) . '/main.php'), array(
            // Put front-end settings there.
            'components' => array(
//                'clientScript' => array(
//                    'packages' => array(
//                        'jquery' => array(
//                            'baseUrl' => '//ajax.googleapis.com/ajax/libs/jquery/2.0.3/',
//                            'js' => array('jquery.min.js'),
//                            'coreScriptPosition' => CClientScript::POS_HEAD,
//                        ),
//                        'jquery.ui' => array(
//                            'baseUrl' => '//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/',
//                            'js' => array('jquery-ui.min.js'),
//                            'depends' => array('jquery'),
//                            'coreScriptPosition' => CClientScript::POS_BEGIN,
//                        ),
//                    ),
//                ),
                // uncomment the following to enable URLs in path-format
                'urlManager' => array(
                    'urlFormat' => 'path',
                    'showScriptName' => false,
                    'urlSuffix' => '.html',
                    'rules' => array(
                        '<action>' => 'site/<action>',
                        '<controller:\w+>/<id:\d+>' => '<controller>/view',
                        '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                        '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                    ),
                ),
            ),
            'theme' => 'default',
            'params' => array(
                // this is used in contact page
                'adminEmail' => 'info@goldenbusinessbd.com',
                'pageSize' => 10,
                'pageSize20' => 20,
                'pageSize50' => 50,
                'pageSize100' => 100,
            ),
                )
);
