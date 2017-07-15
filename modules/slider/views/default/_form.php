<?php

use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use common\helpers\Html;

/* @var $this yii\web\View */
/* @var $model modules\slider\models\Slider */
/* @var $form yii\widgets\ActiveForm */
?>
<?php //echo Html::errorSummary($model)?>
<?php $form = ActiveForm::begin(['id' => 'form-slider-create']); ?>
<div class="box-body">
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-6">
            <?php
            if(empty($oldImage)) {
                $imagePreview = [];
            } else {
                $imagePreview[] = '<img src="' . $oldImage . '" style="max-width:200px; max-height: 200px;">';
            }

            echo $form->field($model, 'sliderImage')->widget(FileInput::classname(), [
                'options' => ['accept' => 'image/*', 'multiple' => false],
                'pluginOptions' => [
                    'allowedFileExtensions' => ['jpg', 'jpeg', 'png', 'gif'],
                    'initialPreview' => $imagePreview,
                    'showUpload' => false,
                    'showRemove' => true,
                    'maxFileSize' => 3072,
                    'showClose' => false,
                    'browseLabel' => ' Select Image',
                    'browseIcon' => '<i class="fa fa-image"></i>',
                    'showRemove' => false,
                    //'removeIcon' => '<i class="glyphicon glyphicon-trash"></i> ',
                    //'removeLabel' => '',
                ]
            ]);
            ?>
        </div>
    </div>
</div>
<div class="box-footer">
    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>
<?php ActiveForm::end(); ?>
