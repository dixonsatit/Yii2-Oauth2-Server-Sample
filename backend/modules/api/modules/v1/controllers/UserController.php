<?php

namespace backend\modules\api\modules\v1\controllers;

use yii\rest\ActiveController;

class UserController extends ActiveController
{
    public $modelClass = 'dektrium\user\models\User';

    public function actionInfo(){
        return [
            'sucesss'=>' Success!!.',
            'data'=>[]
        ];
    }
}
