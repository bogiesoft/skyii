<?php

use yii\helpers\Html;
use modules\settings\Module;

/**
 * @var yii\web\View $this
 * @var modules\settings\models\Setting $model
 */
$this->title = Module::t(
    'settings',
    'Create {modelClass}',
    [
        'modelClass' => Module::t('settings', 'Setting'),
    ]
);
$this->params['breadcrumbs'][] = ['label' => Module::t('settings', 'Settings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="setting-create">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', ['model' => $model]) ?>
</div>
