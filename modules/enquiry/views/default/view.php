<?php

use yii\widgets\DetailView;
use common\helpers\Html;

/* @var $this yii\web\View */
/* @var $model modules\enquiry\models\Enquiry */

$this->title = Html::setTitle('Enquiry : '.$model->customer_name);
$this->params['breadcrumbs'][] = ['label' => 'Enquiries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->customer_name;
$this->params['page_title'] = 'Enquiry';
$this->params['page_type'] = 'view';
?>
<div class="box">
    <div class="box-header with-border">
        <span>
            <?php echo Html::backButton(); ?>
        </span>
        <span>
            <?= Html::a('Update', ['update', 'id' => $model->enquiry_id], ['class' => 'btn btn-primary']) ?>
        </span>
        <span>
            <?= Html::a('Delete', ['delete', 'id' => $model->enquiry_id], [
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
                        'enquiry_id',
                        'user_id',
                        'customer_name',
                        'email:email',
                        'phone',
                        'budget',
                        'description',
                        'status',
                        'query_assigned_to',
                        'remark',
                        'remark_date',
                        'last_status_change_date',
                        'created_at',
                        'created_by',
                        'updated_at',
                        'updated_by',
                    ],
                ]) ?>
            </div>
        </div>
    </div>
    <div class="box-footer">
    </div>
</div>
