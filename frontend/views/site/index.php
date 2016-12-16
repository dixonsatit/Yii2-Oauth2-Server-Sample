<?php
use yii\authclient\widgets\AuthChoice;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>


        <?php $authAuthChoice = AuthChoice::begin([
            'baseAuthUrl' => ['/user/security/auth'],
            //'baseAuthUrl' => ['/site/auth'],
            'popupMode' => true,
            ]); ?>
                <?php foreach ($authAuthChoice->getClients() as $key => $client): ?>
                    <?= $authAuthChoice->clientLink($client,'DOH Login',['class'=>'btn btn-success btn-lg']) ?>
                <?php endforeach; ?>
            <?php AuthChoice::end(); ?>

    </div>


</div>
