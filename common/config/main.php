<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => yii\caching\FileCache::className(),
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                'FileTarget' => [
                    'class' => yii\log\FileTarget::className(),
                    'levels' => ['error', 'warning'],
                    'logFile' => '@runtime/logs/' . date('Y-m-d') . '/' . date('h-i-s') . '-app.log'
                ],
            ],
        ],
        'date'=>[
            'class'=>common\components\DateComponent::className()
        ]
    ],
//    'modules' => [
//        'eonline' => 'eonline\Module'
//    ]
];
