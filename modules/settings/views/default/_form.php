<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use modules\settings\Module;
use modules\settings\models\Setting;

/**
 * @var yii\web\View $this
 * @var modules\settings\models\Setting $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="setting-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'section')->textInput(['maxlength' => 255]) ?>
    <?= $form->field($model, 'key')->textInput(['maxlength' => 255]) ?>
    <?= $form->field($model, 'value')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'active')->checkbox(['value' => 1]) ?>
    <?=
    $form->field($model, 'type')->dropDownList(
        $model->getTypes()
    )->hint(Module::t('settings', 'Change at your own risk')) ?>
    <div class="form-group">
        <?=
        Html::submitButton(
            $model->isNewRecord ? Module::t('settings', 'Create') :
                Module::t('settings', 'Update'),
            [
                'class' => $model->isNewRecord ?
                    'btn btn-success' : 'btn btn-primary'
            ]
        ) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
