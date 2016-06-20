<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\Profile */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Create Profile';
$this->params['breadcrumbs'][] = $this->title;
?>

<div>
    <p>We will create your profile here</p>
</div>
<div class="row">
    <div class="col-lg-5">
        <?php $form = ActiveForm::begin(['id' => 'create-profile']); ?>
        <?= $form->field($model, 'aboutme'); ?>
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>

</div>
