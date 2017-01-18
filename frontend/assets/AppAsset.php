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
    'css/fileinput.css',
        'css/site.css',
    ];
    public $js = [
    'js/fileinput.js',
    'js/plugins/canvas-to-blob.min.js',
    'js/upload.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',

    ];
}
