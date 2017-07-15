<?php

use common\helpers\Html;

/* @var $this yii\web\View */
/* @var $model modules\slider\models\Slider */

$this->title = Html::setTitle('Create Slider');
$this->params['breadcrumbs'][] = ['label' => 'Sliders', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Create Slider';
$this->params['page_title'] = 'Slider';
$this->params['page_type'] = 'create';
?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <?php
            echo $this->render('_form', [
                'model' => $model,
                'oldImage' => ''
            ]);
            ?>
        </div>
    </div>
</div>
