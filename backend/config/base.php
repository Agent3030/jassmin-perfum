<?php
return [
    'id' => 'backend',
    'basePath' => dirname(__DIR__),
    'components' => [
        'urlManager' => require(__DIR__.'/_urlManager.php'),
        'urlManagerFrontend' => require(__DIR__.'/_urlManagerFrontend.php'),
        'frontendCache' => require(Yii::getAlias('@frontend/config/_cache.php'))
    ],
];
