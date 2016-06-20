<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\User */

use yii\helpers\Html;
    

$this->title = 'Pollos User Profile';
?>
<div>
    <h1><?=Html::encode($this->title)?></h1>
    <P>This is where your picture will go</P>
    <div class="jumbotron">
        <div class="image">
            This is where the Image Will Go
        </div>
        <div class="bio">
            This is where the Bio WIll Go
        </div>
        <div class="friends">
            This is where friends will go
        </div>
        <div class="comments">
            This is where comments will go
        </div>
    </div>
</div>
