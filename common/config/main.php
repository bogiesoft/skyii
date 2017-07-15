<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
            'cacheFileSuffix' => '.bin',
            'cachePath' => '@backend/runtime/cache',
            'dirMode' =>  '0775',
            'directoryLevel' =>  '1',
            'keyPrefix' => 'skyii_',
        ],
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                    'sourceLanguage' => 'en-US',
                    'forceTranslation'=> true,
                ],
            ],
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'user' => [
            'identityClass' => 'modules\user\models\User',
            //'class' => 'modules\user\models\User'
        ],
        'settings' => [
            'class' => 'modules\settings\components\Settings'
        ],
    ],
    'modules' => [
        'gridview' => [
            'class' => '\kartik\grid\Module',
            // enter optional module parameters below - only if you need to
            // use your own export download action or custom translation message source
            // 'downloadAction' => 'gridview/export/download',
            // 'i18n' => []
        ],
        'datecontrol' => [
            'class' => '\kartik\datecontrol\Module',
        ],
        'treemanager' =>  [
            'class' => '\kartik\tree\Module',
        ],
        'user' => [
            'class' => 'modules\user\Module',
            //'layout' => 'modules/user/views/layouts/main',
        ],
        'utility' => [
            'class' => 'c006\utility\migration\Module',
        ],
        'settings' => [
            'class' => 'modules\settings\Module',
        ],
        'slider' => [
            'class' => 'modules\slider\Module',
        ],
        'enquiry' => [
            'class' => 'modules\enquiry\Module',
        ],
        'localisation' => [
            'class' => 'modules\localisation\Module',
        ],
    ],
];
