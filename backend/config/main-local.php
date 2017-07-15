<?php
$config = [
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'L7gxHWo9-gbvsowEgI08BDxQQsdqKidu',
        ],
    ],
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        'allowedIPs' => ['*'],
    ];
    
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => ['*'],
        'generators' => [
            'crud' => [
                'class' => 'yii\gii\generators\crud\Generator',
                // Using custom templates for CRUD generator in Gii tool.
                'templates' => [
                    // template name => path to template
                    'admin-lte' => '@root/templates/crud/admin-lte',
                ]
            ],
            'model' => [
                'class' => 'yii\gii\generators\model\Generator',
                'templates' => [
                    'admin-lte' => '@root/templates/model/admin-lte/default',
                ]
            ]
        ],
    ];
}

return $config;
