<?php

use yii\widgets\ActiveForm;
use common\helpers\Html;

/* @var $this yii\web\View */
/* @var $model modules\localisation\models\Country */
/* @var $form yii\widgets\ActiveForm */
?>
<?php //echo Html::errorSummary($model); ?>
<div class="box-body">
    <div class="row">
        <?php $form = ActiveForm::begin(); ?>
            <div class="col-sm-4 col-sm-offset-4">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'priority')->textInput(['maxlength' => true]) ?>
                <div class="box-footer text-center">
                    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>
            </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
