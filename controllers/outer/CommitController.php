<?php
/**
 * Created by PhpStorm.
 * User: wzj-dev
 * Date: 18/3/14
 * Time: 下午4:28
 */

namespace app\modules\controllers\outer;
use yii\web\Controller;

class CommitController extends Controller
{
    public function actions(){
        return [
            "login"         => 'app\modules\actions\outer\commit\LoginAction',
        ];
    }
}