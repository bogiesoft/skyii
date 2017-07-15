<?php

use yii\grid\GridView;
use common\helpers\Html;
use common\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel modules\enquiry\models\EnquirySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Html::setTitle('Enquiries');
$this->params['breadcrumbs'][] = 'Enquiries';
$this->params['page_title'] = 'Enquiries';
$this->params['page_type'] = 'list';
?>
<div class="row">
    <div class="col-xs-12">
        <?php //echo $this->render('_search', ['model' => $searchModel]); ?>
        <div class="box">
            <div class="box-header with-border">
                <?= Html::a('Create Enquiry', ['create'], ['class' => 'btn btn-success']) ?>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <?=
                GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        'customer_name',
                        'email:email',
                        'phone',
                        [
                            'attribute' => 'status',
                            'value' => function($model) {
                                return $model->status == 0 ? 'Inactive' : 'Active';
                            },
                            'filter' => [
                                0 => 'Inactive',
                                10 => 'Active'
                            ]
                        ],
                        'created_at:date',
                        // 'budget',
                        // 'description',
                        // 'query_assigned_to',
                        // 'remark',
                        // 'remark_date',
                        // 'last_status_change_date',
                        // 'created_by',
                        // 'updated_at',
                        [
                            'class' => 'yii\grid\ActionColumn',
                            'buttons' => [
                                'activate' => function($url, $model) {
                                    if ($model->status == 10) {
                                        return '';
                                    }
                                    $options = [
                                        'title' => 'Activate',
                                        'aria-label' => 'Activate',
                                        'data-confirm' => 'Are you sure you want to activate this user?',
                                        'data-method' => 'post',
                                        'data-pjax' => '0',
                                    ];
                                    return Html::a('<span class="glyphicon glyphicon-ok"></span>', $url, $options);
                                },
                            ],
                        ],
                    ],
                ]);
                ?>
            </div>
        </div>
    </div>
</div>
