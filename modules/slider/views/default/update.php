<?php

use common\helpers\Html;

/* @var $this yii\web\View */
/* @var $model modules\slider\models\Slider */

$this->title = Html::setTitle('Update Slider: ' . $model->title);
$this->params['breadcrumbs'][] = ['label' => 'Sliders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['page_title'] = 'Slider';
$this->params['page_type'] = 'update';
?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <?php
            echo $this->render('_form', [
                'model' => $model,
                'oldImage' => $oldImage
            ]);
            ?>
        </div>
    </div>
</div>
