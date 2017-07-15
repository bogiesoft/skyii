<?php

use yii\widgets\DetailView;
use common\helpers\Html;

/* @var $this yii\web\View */
/* @var $model modules\localisation\models\State */

$this->title = Html::setTitle($model->name);
$this->params['breadcrumbs'][] = ['label' => 'States', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->name;
$this->params['page_title'] = 'States';
$this->params['page_type'] = 'view';
?>
<div class="box">
    <div class="box-header with-border">
        <span>
            <?= Html::backButton() ?>
        </span>
        <span>
            <?= Html::a('List', ['index'], ['class' => 'btn btn-info']) ?>
        </span>
        <span>
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        </span>
        <span>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </span>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    
    <div class="box-body">
        <div class="row">
            <div class="col-sm-11">
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'id',
                        'country_code',
                        'name',
                        'priority',
                         [
                            'attribute' => 'status',
                            'value' => $model->state,
                         ],
                         [
                            'attribute' => 'created_by',
                            'value' => isset($model->createdBy->username) ? $model->createdBy->username : null,
                         ],
                         [
                            'attribute' => 'updated_by',
                            'value' => isset($model->updatedBy->username) ? $model->updatedBy->username : null,
                         ],
                        'created_at:date',
                        'updated_at:date',
                    ],
                ]) ?>
            </div>
        </div>
    </div>
    <div class="box-footer">
    </div>
</div>
