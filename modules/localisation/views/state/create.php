<?php

use common\helpers\Html;

/* @var $this yii\web\View */
/* @var $model modules\localisation\models\State */
/* @var $countryList modules\localisation\models\Country */

$this->title = Html::setTitle('Create State');
$this->params['breadcrumbs'][] = ['label' => 'States', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Create State';
$this->params['page_title'] = 'States';
$this->params['page_type'] = 'create';
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
