<?php

use common\helpers\Html;

/* @var $this yii\web\View */
/* @var $model modules\enquiry\models\Enquiry */

$this->title = Html::setTitle('Create Enquiry');
$this->params['breadcrumbs'][] = ['label' => 'Enquiries', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Create Enquiry';
$this->params['page_title'] = 'Enquiry';
$this->params['page_type'] = 'create';
?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <?php
            echo $this->render('_form', [
                'model' => $model,
            ]);
            ?>
        </div>
    </div>
</div>
