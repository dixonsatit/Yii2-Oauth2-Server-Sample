<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;
use yii\helpers\Console;

class RbacInitController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        $auth->removeAll();

        $loginToBackend = $auth->createPermission('LoginToBackend');
        $loginToBackend->description = 'ล็อกอินเข้าใช้งานส่วน backend';
        $auth->add($loginToBackend);

        $user = $auth->createRole('User');
        $user->description = 'ผู้ใช้งานทั่วไป';
        $auth->add($user);

        $management = $auth->createRole('Management');
        $management->description = 'ผู้ดูแลระบบระดับกลาง';
        $auth->add($management);

        $admin = $auth->createRole('Admin');
        $admin->description = 'ผู้ดูแลระบบสูงสุด';
        $auth->add($admin);

        $auth->addChild($management, $user);
        $auth->addChild($management, $loginToBackend);
        $auth->addChild($admin, $management);

        $auth->assign($admin, 1);

        Console::output('Initiation Success.');
    }
}
