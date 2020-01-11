<?php
/**
 * Created by PhpStorm.
 * User: floor12
 * Date: 24.06.2018
 * Time: 12:51
 */

namespace floor12\notification;

use yii\helpers\Html;
use \Yii;

/**
 * Class Notification
 * Its a notification php helper class. It registers AssetBundle in a view and runs Js function.
 * @package floor12\notification
 */
class Notification
{

    const TYPE_INFO = "0";
    const TYPE_SUCCESS = "1";
    const TYPE_ERROR = "2";

    /**Registers AssetBundle in a view.
     * Returns string with Javascript info() function call.
     * @param $text
     * @param $type
     * @return string
     */
    public static function notification($text, $type): string
    {
        NotificationAsset::register(Yii::$app->getView());
        return Html::script("info(\"{$text}\",{$type});");
    }

    /** Alias to self::notification with INFO type.
     * @param $text
     * @return string
     */
    public static function info($text): string
    {
        return self::notification($text, self::TYPE_INFO);
    }

    /** Alias to self::notification with ERROR type.
     * @param $text
     * @return string
     */
    public static function error($text): string
    {
        return self::notification($text, self::TYPE_ERROR);
    }

    /** Alias to self::notification with SUCCESS type.
     * @param $text
     * @return string
     */
    public static function success($text): string
    {
        return self::notification($text, self::TYPE_SUCCESS);
    }

}