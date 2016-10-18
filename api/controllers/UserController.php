<?php

namespace api\controllers;

use yii\rest\ActiveController;

use yii\web\Response;

class UserController extends ActiveController
{
    public $modelClass = 'common\models\User';
}
