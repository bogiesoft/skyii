<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use modules\settings\Module;

/**
 * @var yii\web\View $this
 * @var modules\settings\models\SettingSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>
<div class="setting-search">
    <?php $form = ActiveForm::begin(
        [
            'action' => ['index'],
            'method' => 'get',
        ]
    ); ?>
    <?= $form->field($model, 'id') ?>
    <?= $form->field($model, 'section') ?>
    <?= $form->field($model, 'key') ?>
    <?= $form->field($model, 'value') ?>
    <?= $form->field($model, 'active')->checkbox() ?>
    <div class="form-group">
        <?= Html::submitButton(Module::t('settings', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Module::t('settings', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>