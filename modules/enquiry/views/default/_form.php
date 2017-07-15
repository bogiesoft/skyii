<?php

use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use common\helpers\Html;

/* @var $this yii\web\View */
/* @var $model modules\enquiry\models\Enquiry */
/* @var $form yii\widgets\ActiveForm */
?>
<?php //echo Html::errorSummary($model)?>
<?php $form = ActiveForm::begin(['id' => 'form-enquiry-create']); ?>
<div class="box-body">
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'customer_name')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'remark')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'remark_date')->textInput() ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'budget')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'query_assigned_to')->textInput() ?>
        </div>
    </div>
</div>
<div class="box-footer">
    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>
<?php ActiveForm::end(); ?>
