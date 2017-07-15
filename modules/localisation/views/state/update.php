<?php

use common\helpers\Html;

/* @var $this yii\web\View */
/* @var $model modules\localisation\models\State */

$this->title = Html::setTitle('Update State: ' . $model->name);
$this->params['breadcrumbs'][] = ['label' => 'States', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
$this->params['page_title'] = 'States';
$this->params['page_type'] = 'update';
?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <?= $this->render('_form', [
                'model' => $model,
                'countryList' => $countryList
            ]) ?>
        </div>
    </div>
</div>
