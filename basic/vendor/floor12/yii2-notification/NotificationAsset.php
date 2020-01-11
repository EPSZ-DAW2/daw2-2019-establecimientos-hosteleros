<?php
/**
 * Created by PhpStorm.
 * User: floor12
 * Date: 24.06.2018
 * Time: 12:51
 */

namespace floor12\notification;

use yii\web\AssetBundle;
use yii\web\View;

/** Main AssetBundle of extension.
 * This extension needs to some JS and CSS files to include in your view.
 * Class NotificationAsset
 * @package floor12\notification
 */
class NotificationAsset extends AssetBundle
{
    public $jsOptions = ['position' => View::POS_HEAD];
    public $sourcePath = '@vendor/floor12/yii2-notification/';
    public $css = [
        'floor12-notification.css'
    ];
    public $js = [
        'floor12-notification.js'
    ];
}
