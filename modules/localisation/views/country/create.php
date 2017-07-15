<?php

use common\helpers\Html;

/* @var $this yii\web\View */
/* @var $model modules\localisation\models\Country */

$this->title = Html::setTitle('Create Country');
$this->params['breadcrumbs'][] = ['label' => 'Countries', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Create Country';
$this->params['page_title'] = 'Countries';
$this->params['page_type'] = 'create';
?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>
