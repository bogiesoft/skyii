<?php

use common\helpers\Html;

/* @var $this yii\web\View */
/* @var $model modules\enquiry\models\Enquiry */

$this->title = Html::setTitle('Update Enquiry');
$this->params['breadcrumbs'][] = ['label' => 'Enquiries', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->enquiry_id, 'url' => ['view', 'id' => $model->enquiry_id]];
$this->params['breadcrumbs'][] = 'Update';
$this->params['page_title'] = 'Enquiry';
$this->params['page_type'] = 'update';
?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <?php
            echo $this->render('_form', [
                'model' => $model
            ]);
            ?>
        </div>
    </div>
</div>
