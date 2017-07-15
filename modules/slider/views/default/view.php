<?php

use yii\widgets\DetailView;
use common\helpers\Html;

/* @var $this yii\web\View */
/* @var $model modules\slider\models\Slider */

$this->title = Html::setTitle('Slider : '.$model->title);
$this->params['breadcrumbs'][] = ['label' => 'Sliders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->title;
$this->params['page_title'] = 'Sliders';
$this->params['page_type'] = 'view';
?>
<div class="box">
    <div class="box-header with-border">
        <span>
            <?php echo Html::backButton(); ?>
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
                        'title',
                        'description',
                        'image',
                        'active',
                        'created_at',
                    ],
                ]);
                ?>
            </div>
        </div>
    </div>
    <div class="box-footer">
    </div>
</div>
