<?php
namespace common\helpers;

use Yii;
use common\helpers\Crypt;

class Html extends \yii\helpers\Html
{
    public static function setTitle($title = null)
    {
        return empty($title) ? Yii::$app->params['app_name'] : $title . ' | ' .  Yii::$app->params['app_name'];
    }

    public static function backButton($options = [])
    {
        return Html::a('Back', Yii::$app->request->referrer, ['class' => 'btn btn-default']);
    }

    public static function ajaxSubmit($view, $options = [])
    {
        $btnId = empty($options['id']) ? 'submitButton' : $options['id'];

        $button = '<button type="button" id="'.$btnId.'"';
        if (!empty($options['class'])) {
            $button .= " class='{$options['class']}'";
        }

        if (!empty($options['label'])) {
            $button .= '>' . $options['label'] . '</button>';
        }

        $output = '$(document).on("click","#' . $btnId . '",function() { ';
        if (!empty($options['customScript'])) {
            $output .= $options['customScript'];
        }
        $output .= "$.ajax({";
        $data = !empty($options['data']) ? "{$options['data']}" : "$(this).parents(\"form\").serialize()";
        $output .= "data:{$data},";
        if (!empty($options['type'])) {
            $output .= "type:'{$options['type']}',";
        }

        $formMethod = !empty($options['method']) ? $options['method'] : 'post';
        $output .= "method:'{$formMethod}',";

        if (!empty($options['dataType'])) {
            $output .= "dataType:'{$options['dataType']}',";
        } else {
            $output .= "dataType:'json',";
        }

        if (!empty($options['success'])) {
            $successFunction = $options['success'];
        } else {
            $successFunction = "function(data) {
                console.log(data);
                if(data.status == 'exception') {
                    $('#$btnId').button('reset');
                    //console.log(data);
                    //alert(data.msg);
                    alert('Something went wrong. Please refresh the page and try again.');
                } else if(data.status == 'error'){
                    $('#$btnId').button('reset');
                    if(data.errors){
                        $.each(data.errors,function(attribute,messages){
                            $('.field-'+attribute).addClass('has-error');
                            $('.field-'+attribute).find('.help-block').addClass('help-block-error').html(messages[0]).show();
                        });
                        //var errorField = Object.keys(data.errors);
                        //var errorTop = $('.field-' + errorField[0]).position().top;
                        $('body').animate({scrollTop: '0px'}, 500);
                    }

                    if(data.msg) {
                        console.log(data);
                        alert(data.msg);
                    }
                } else if(data.status == 'success'){
                    if(data.redirectUrl){
                        showLoader();
                        window.location.href= data.redirectUrl;
                    }
                }
            }";
        }
        $output .= "success:{$successFunction},";

        if (!empty($options['error'])) {
            $output .= "error: function(data){ ".$options['error']." },";
        }

        $completeFunction = !empty($options['complete']) ? $options['complete'] :"function(){ hideLoader(); }";
        $output .= "complete:{$completeFunction},";
        $beforeSendFunction = !empty($options['beforeSend']) ? $options['beforeSend'] : "function(){\$('#$btnId').button('loading');showLoader();}";
        $output .= "beforeSend:{$beforeSendFunction},";

        if (!empty($options['url'])) {
            $output .= "url:'{$options['url']}',";
        }

        $output .= "});";
        $output .= "return false;";
        $output .= "});"."\n";

        // Hitting enter will submit the button
        $output .= "$('input[type=\"text\"]').keypress(function (e) {
                var code = e.keyCode || e.which;
                // On Enter press
                if (code === 13) {
                    e.preventDefault();
                    $('#$btnId').click();
                }
            });"."\n";

        echo $button;

        $view->registerJs($output);
    }

    /**
     * @param array $invoiceDetail
     * @param string $controller
     * @return string
     */
    public static function actionMenu($invoiceDetail = [], $controller = '')
    {
        $invoiceId = '';
        $return = '<div class="dropdown btn-group drop-icon">
            <button data-toggle="dropdown" class="btn btn-warning dropdown-toggle drop-sm-btn" type="button" aria-expanded="false" title="Menu">
                <span class="glyphicon glyphicon-cog"></span>
            </button>
            <ul class="dropdown-menu">';

        if (!empty($invoiceDetail->invoice_id)) {
            $invoiceId = $invoiceDetail->invoice_id;
            $invoiceId = Crypt::encode($invoiceId);
        }

        if ($invoiceDetail->status == 'p') {
            $return .= "<li>" . Html::a('Mark as Unpaid', [$controller . '/updatestatus', 'id' => $invoiceId]) . "</li>";
        } else {
            $return .= "<li>" . Html::a('Mark as Paid', [$controller . '/updatestatus', 'id' => $invoiceId]) . "</li>";
        }

        $invoiceType = 's';
        if ($controller == 'invoicepurchase') {
            $invoiceType = 'p';
        }

        $return .= "<li>" . Html::a('Download PDF', [$controller.'/exportinpdf', 'id' => $invoiceId], ['target' => '_blank']) . "</li>";
        $return .= "<li>" . Html::a('View Payment', ['invoicepayment/viewpayment', 'id' => $invoiceId, 'invoice_type' => $invoiceType], ['target' => '_blank']) . "</li>";
        $return .= "<li>" . Html::a('Duplicate Invoice ', [$controller . '/createduplicateinvoice', 'id' => $invoiceId]) . "</li>";
        $return .= '</ul> </div>';

        return $return;
    }
}
