<?php

namespace backend\modules\api;

/**
 * api module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'backend\modules\api\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        $this->modules = [
            'v1' => [
                'class' => 'backend\modules\api\modules\v1\Module',
            ]
        ];
        // custom initialization code goes here
    }
}
