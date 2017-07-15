<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/plugin/bootstrap/css/bootstrap.min.css',
        'css/animate.css',
        'css/hover-min.css',
        'https://fonts.googleapis.com/icon?family=Material+Icons',
        'css/plugin/ionicons/css/ionicons.min.css',
        'css/plugin/font-awesome/css/font-awesome.min.css',
        'css/plugin/materialize/css/materialize.min.css',
        'css/bootstrap-slider.min.css',
        'css/styles.css',
        'css/fontawesome-stars-o.css',
        'https://fonts.googleapis.com/css?family=Lato:400,700',
        'css/bars-movie.css',
        'css/smooth-scrollbar.css',
        'css/lity.css'
    ];
    public $js = [
        'css/plugin/jquery/jquery.min.js',
        'frontend/web/js/init.js',
        'css/plugin/tether/js/tether.min.js',
        'css/plugin/bootstrap/js/bootstrap.min.js',
        'frontend/web/js/lity.js',
        'css/plugin/materialize/js/materialize.min.js',
        'frontend/web/js/main.js',
        'frontend/web/js/smooth-scrollbar.js',
        'frontend/web/js/bootstrap-slider.min.js',
        'frontend/web/js/jquery.barrating.js',

        'https://cdnjs.cloudflare.com/ajax/libs/masonry/3.3.2/masonry.pkgd.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
        //'yii\bootstrap\BootstrapPluginAsset',
    ];
}
