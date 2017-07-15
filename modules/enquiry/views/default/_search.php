<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model modules\enquiry\models\EnquirySearch */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="enquiry-search">
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'enquiry_id') ?>
    <?= $form->field($model, 'user_id') ?>
    <?= $form->field($model, 'customer_name') ?>
    <?= $form->field($model, 'email') ?>
    <?= $form->field($model, 'phone') ?>
    <?php // echo $form->field($model, 'budget') ?>
    <?php // echo $form->field($model, 'description') ?>
    <?php // echo $form->field($model, 'status') ?>
    <?php // echo $form->field($model, 'query_assigned_to') ?>
    <?php // echo $form->field($model, 'remark') ?>
    <?php // echo $form->field($model, 'remark_date') ?>
    <?php // echo $form->field($model, 'last_status_change_date') ?>
    <?php // echo $form->field($model, 'created_at') ?>
    <?php // echo $form->field($model, 'created_by') ?>
    <?php // echo $form->field($model, 'updated_at') ?>
    <?php // echo $form->field($model, 'updated_by') ?>
    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
