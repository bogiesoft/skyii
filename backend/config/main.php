<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    //'layout' => 'main',
    'modules' => [],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
            'class' => 'common\components\Request',
            'web'=> '/backend/web',
            'adminUrl' => '/admin'
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '' => 'site/index',
                '<controller:(branch|state|country)>' => '<controller>/index',
                'login' => 'user/user/login',
                'logout' => 'user/user/logout',
                'profile' => 'user/profile/view',
                'profile/update' => 'user/profile/update',
                'user' => 'user/user/index',
                'user/<id:\d+>' => 'user/user/view',
                'user/create' => 'user/user/create',
                'user/<id:\d+>/update' => 'user/user/update',
    
                '<module:\w+>/' => '<module>/default/index',
                '<module:\w+>/create' => '<module>/default/create',
                '<module:\w+>/<id:\d+>/update' => '<module>/default/update',
                '<module:\w+>/<id:\d+>/delete' => '<module>/default/delete',
                
                'slider/<id:\d+>' => 'slider/default/view',
                'enquiry/<id:\d+>' => 'enquiry/default/view',
    


                'localisation/country/<id:\d+>' => 'localisation/country/view',
                'localisation/state/<id:\d+>' => 'localisation/state/view',
                'localisation/country' => 'localisation/country/index',
                'localisation/state' => 'localisation/state/index',
                
                //'user/<action:\w+>' => 'user/user/<action>',
                //'<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<module:\w+>/<controller:\w+>/<id>/<action:\w+>' => '<module>/<controller>/<action>',
            ],
        ],
        'assetManager' => [
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'js' => [],
                    'css' => [],
                ],
                'yii\bootstrap\BootstrapPluginAsset' => [
                    'js' => [],
                    'css' => [],
                ],
                'yii\jui\JuiAsset' => [
                    'js' => [],
                    'css' => [],
                ],
                'yii\bootstrap\BootstrapAsset' => [
                    'js' => [],
                    'css' => [],
                ],
            ],
        ],
    ],
    'params' => $params,
];
