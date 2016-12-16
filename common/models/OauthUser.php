<?php

namespace common\models;

use Yii;
use sweelix\oauth2\server\interfaces\UserModelInterface;
use dektrium\user\models\User as BaseUser;

class OauthUser extends BaseUser implements UserModelInterface
{
     use \sweelix\oauth2\server\traits\IdentityTrait;

     public static function findByUsernameAndPassword($username, $password)
     {
         $user = static::findByUsername($username);
         return (!$user || !$user->validatePassword($password,$user->password_hash)) ? null : $user;
     }

    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    /**
     * @return array list of restricted scopes for current user or null
     */
    public function getRestrictedScopes(){

    }

    /**
     * @param array $scopes define restricted scopes for current user
     */
    public function setRestrictedScopes($scopes){

    }

    public function validatePassword($password, $password_hash)
    {
        return Yii::$app->security->validatePassword($password, $password_hash);
    }
}
