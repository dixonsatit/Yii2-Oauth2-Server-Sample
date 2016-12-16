<?php

namespace frontend\components;

use yii\authclient\OAuth2;
use dektrium\user\clients\ClientInterface;

class DohClient extends OAuth2
{
    public $authUrl = 'http://app-frontend.dev:9091/oauth2/authorize/index';

    public $tokenUrl = 'http://app-frontend.dev:9091/oauth2/token/index';

    public $apiBaseUrl = 'http://app-frontend.dev:9091/api/v1/user/info';

    protected function defaultName()
    {
        return 'doh';
    }

    protected function defaultTitle()
    {
        return 'DOH';
    }

    protected function defaultViewOptions()
    {
        return [
            'popupWidth' => 800,
            'popupHeight' => 500,
        ];
    }

    protected function initUserAttributes()
    {
        return $this->api('user/info', 'GET');
    }

        /** @inheritdoc */
    public function getEmail()
    {
        return isset($this->getUserAttributes()['email'])
            ? $this->getUserAttributes()['email']
            : null;
    }
    /** @inheritdoc */
    public function getUsername()
    {
        return;
    }
}
