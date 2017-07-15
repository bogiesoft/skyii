<?php

use kartik\grid\GridView;
use common\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel modules\localisation\models\StateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Html::setTitle('States');
$this->params['breadcrumbs'][] = 'States';
$this->params['page_title'] = 'States';
$this->params['page_type'] = 'list';
?>
<div class="row">
    <div class="col-xs-12">
        <?php //echo $this->render('_search', ['model' => $searchModel]); ?>
        <div class="box">
            <div class="box-body">

                    <?= GridView::widget([
                        'id' => 'state-datatable',
                        'dataProvider' => $dataProvider,
                        'tableOptions' => ['class' => 'vertical-middle'],
                        'filterModel' => $searchModel,
                        'columns' => [
                            //[
                                //'class' => 'kartik\grid\CheckboxColumn',
                                //'width' => '20px',
                            //],
                            [
                                'class' => 'kartik\grid\SerialColumn',
                                'width' => '30px',
                            ],

                            // 'id',
                            [
                                'attribute' => 'country_code',
                                'value' => function($searchModel) {
                                    return !empty($searchModel->country->name) ? $searchModel->country->name : null;
                                },
                            ],
                            'name',
                            'priority',
                            /*[
                                'attribute' => 'status',
                                'value' => function($searchModel) {
                                    return $searchModel->state;
                                },
                            ],*/
                            /*[
                                'attribute' => 'created_by',
                                'value' => function($searchModel) {
                                    return isset($searchModel->createdBy->username) ? $searchModel->createdBy->username : null;
                                },
                            ],*/
                            /*[
                                'attribute' => 'updated_by',
                                'value' => function($searchModel) {
                                    return isset($searchModel->updatedBy->username) ? $searchModel->updatedBy->username : null;
                                },
                            ],*/
                            'created_at:date',
                            'updated_at:date',

                            [
                                'class' => '\kartik\grid\ActionColumn',
                                'template' => '{view} {update} {delete}',
                            ],
                        ],
                        'responsive' => true,
                        'hover' => true,
                        'pjax' => false,
                        'showPageSummary' => false,
                        'exportConfig' => [
                            GridView::CSV => [
                                'label' => 'CSV',
                                'icon' => 'floppy-open',
                                'iconOptions' => ['class' => 'text-primary'],
                                'showHeader' => true,
                                'showPageSummary' => true,
                                'showFooter' => true,
                                'showCaption' => true,
                                'filename' => 'state-list',
                                'alertMsg' => 'The CSV export file will be generated for download.',
                                'options' => ['title' => 'Comma Separated Values'],
                                'mime' => 'application/csv',
                                'config' => [
                                    'colDelimiter' => ",",
                                    'rowDelimiter' => "\r\n",
                                ]
                            ],
                            GridView::TEXT => [
                                'label' => 'Text',
                                'icon' => 'floppy-save',
                                'iconOptions' => ['class' => 'text-muted'],
                                'showHeader' => true,
                                'showPageSummary' => true,
                                'showFooter' => true,
                                'showCaption' => true,
                                'filename' => 'state-list',
                                'alertMsg' => 'The TEXT export file will be generated for download.',
                                'options' => ['title' => 'Tab Delimited Text'],
                                'mime' => 'text/plain',
                                'config' => [
                                    'colDelimiter' => "\t",
                                    'rowDelimiter' => "\r\n",
                                ]
                            ],
                            GridView::EXCEL => [
                                'label' => 'Excel',
                                'icon' => 'floppy-remove',
                                'iconOptions' => ['class' => 'text-success'],
                                'showHeader' => true,
                                'showPageSummary' => true,
                                'showFooter' => true,
                                'showCaption' => true,
                                'filename' => 'state-list',
                                'alertMsg' => 'The EXCEL export file will be generated for download.',
                                'options' => ['title' => 'Microsoft Excel 95+'],
                                'mime' => 'application/vnd.ms-excel',
                                'config' => [
                                    'worksheet' => 'ExportWorksheet',
                                    'cssFile' => ''
                                ]
                            ],
                            GridView::PDF => [
                                'label' => 'PDF',
                                'icon' => 'floppy-disk',
                                'iconOptions' => ['class' => 'text-danger'],
                                'showHeader' => true,
                                'showPageSummary' => true,
                                'showFooter' => true,
                                'showCaption' => true,
                                'filename' => 'state-list',
                                'alertMsg' => 'The PDF export file will be generated for download.',
                                'options' => ['title' => 'Portable Document Format'],
                                'mime' => 'application/pdf',
                                'config' => [
                                    'mode' => 'c',
                                    'format' => 'A4-L',
                                    'destination' => 'D',
                                    'marginTop' => 20,
                                    'marginBottom' => 20,
                                    'cssInline' => '.kv-wrap{padding:20px;}' .
                                        '.kv-align-center{text-align:center;}' .
                                        '.kv-align-left{text-align:left;}' .
                                        '.kv-align-right{text-align:right;}' .
                                        '.kv-align-top{vertical-align:top!important;}' .
                                        '.kv-align-bottom{vertical-align:bottom!important;}' .
                                        '.kv-align-middle{vertical-align:middle!important;}' .
                                        '.kv-page-summary{border-top:4px double #ddd;font-weight: bold;}' .
                                        '.kv-table-footer{border-top:4px double #ddd;font-weight: bold;}' .
                                        '.kv-table-caption{font-size:1.5em;padding:8px;border:1px solid #ddd;border-bottom:none;}',
                                    'methods' => [
                                        'SetHeader' => [
                                            ['odd' => 'PDF Header', 'even' => 'Pdf header']
                                        ],
                                        'SetFooter' => [
                                            ['odd' => 'PDF footer', 'even' => 'PDF Footer']
                                        ],
                                    ],
                                    'options' => [
                                        'title' => 'Your Title',
                                        'subject' => 'PDF export generated by kartik-v/yii2-grid extension',
                                        'keywords' => 'grid, export, yii2-grid, pdf, skyii'
                                    ],
                                    'contentBefore' => '',
                                    'contentAfter' => ''
                                ]
                            ],
                        ],
                       'striped' => true,
                       'condensed' => true,
                       'responsive' => true,
                       'toolbar' => [
                           [
                               'content'=> Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'], ['class' => 'btn btn-success']) . ' '. Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'], ['class' => 'btn btn-default'])
                           ],
                           '{toggleData}',
                           '{export}',
                       ],
                       'layout' => '
                           <div class="box-header with-border">
                               <div class="pull-right">{toolbar}</div>
                           </div>
                           <div>{items}</div>
                           <div>
                               <div class="pull-left">{summary}</div>
                               <div class="pull-right">{pager}</div>
                           </div>
                       ',
                    ]); ?>
            </div>
        </div>
    </div>
</div>
