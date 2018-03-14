<?php
/**
 * Created by PhpStorm.
 * User: wzj-dev
 * Date: 18/3/14
 * Time: 下午3:12
 */

namespace app\modules\controllers\inner;
use yii\web\Controller;

class CheckController extends Controller
{
    public function actions(){
        return [
            "checkLogin"         => 'app\modules\actions\inner\check\CheckLoginAction',
        ];
    }
}